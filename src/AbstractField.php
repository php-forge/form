<?php

declare(strict_types=1);

namespace Forge\Form;

use Forge\Form\Base\FormWidgetInterface;
use Forge\Html\Helper\CssClass;
use Forge\Html\Tag\Tag;
use Forge\Widget\AbstractWidget;
use InvalidArgumentException;
use ReflectionException;

abstract class AbstractField extends AbstractWidget
{
    use Field\Trait\Error;
    use Field\Trait\Hint;
    use Field\Trait\Label;

    private bool|string $ariaDescribedBy = false;
    private string $class = '';
    private bool $container = true;
    private array $containerAttributes = [];
    private bool $inputContainer = false;
    private array $inputContainerAttributes = [];
    private string $inputId = '';
    private string $template = '{label}{input}{hint}{error}';
    private null|AbstractWidget $widget = null;

    /**
     * Return new instance with css class to add to the field.
     *
     * @param string $value The css class to add to the input element.
     *
     * @return static
     */
    public function class(string $value): static
    {
        $new = clone $this;
        $new->class = $value;

        return $new;
    }

    /**
     * Return new instance with container enabled or disabled for the field.
     *
     * @param bool $value True to enable container, false to disable.
     *
     * @return static
     */
    public function container(bool $value): static
    {
        $new = clone $this;
        $new->container = $value;

        return $new;
    }

    /**
     * Returns a new instance with the HTML container attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static
     */
    public function containerAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->containerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with add css class to the container.
     *
     * @param string $value The css class name.
     *
     * @return static
     */
    public function containerClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->containerAttributes, $value);

        return $new;
    }

    public function getContainer(): bool
    {
        return $this->container;
    }

    public function getContainerAttributes(): array
    {
        return $this->containerAttributes;
    }

    public function getWidget(): AbstractWidget
    {
        if (null === $this->widget) {
            throw new InvalidArgumentException('Widget is not set.');
        }

        return $this->widget;
    }

    /**
     * Return new instance with input container enabled or disabled for the field.
     *
     * @param bool $value True to enable input container, false to disable.
     *
     * @return static
     */
    public function inputContainer(bool $value): static
    {
        $new = clone $this;
        $new->inputContainer = $value;

        return $new;
    }

    /**
     * Returns a new instance with the HTML container attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static
     */
    public function inputContainerAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->inputContainerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with add css class to the input container.
     *
     * @param string $value The css class name.
     *
     * @return static
     */
    public function inputContainerClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->inputContainerAttributes, $value);

        return $new;
    }

    /**
     * Return new instance with the template field layout.
     *
     * @param string $value The template field.
     *
     * @return static
     */
    public function template(string $value): static
    {
        $new = clone $this;
        $new->template = $value;

        return $new;
    }

    public function widget(AbstractWidget $value): static
    {
        $new = clone $this;
        /** @var string */

        $new->ariaDescribedBy = $value->attributes['aria-describedby'] ?? '';
        $new->inputId = $value instanceof FormWidgetInterface ? $value->getInputId() : '';
        $new->widget = $value;

        return $new;
    }

    /**
     * @throws ReflectionException
     */
    private function renderError(FormWidgetInterface $widget): string
    {
        $errorAttributes = $this->errorAttributes;

        $errorTag = Field\Error::create(construct: [$widget->getFormModel(), $widget->getAttribute()])
            ->attributes($errorAttributes)
            ->message($this->error)
            ->tag($this->errorTag);

        if (is_callable($this->errorCallback)) {
            $errorTag = $errorTag->messageCallback($this->errorCallback);
        }

        return $errorTag->render();
    }

    /**
     * @throws ReflectionException
     */
    private function renderHint(FormWidgetInterface $widget): string
    {
        $hintAttributes = $this->hintAttributes;

        if (is_bool($this->ariaDescribedBy) && $this->ariaDescribedBy === true) {
            $hintAttributes['id'] = $this->inputId . '-help';
        }

        if (is_string($this->ariaDescribedBy) && $this->ariaDescribedBy !== '') {
            $hintAttributes['id'] = $this->ariaDescribedBy;
        }

        return Field\Hint::create(construct: [$widget->getFormModel(), $widget->getAttribute()])
            ->attributes($hintAttributes)
            ->message($this->hint)
            ->tag($this->hintTag)
            ->render() . PHP_EOL;
    }

    /**
     * @throws ReflectionException
     */
    protected function renderLabel(FormWidgetInterface $widget): string
    {
        $labelAttributes = $this->labelAttributes;

        if (!array_key_exists('for', $labelAttributes)) {
            $labelAttributes['for'] = $widget->getInputId();
        }

        return Field\Label::create(construct: [$widget->getFormModel(), $widget->getAttribute()])
            ->attributes($labelAttributes)
            ->label($this->label)
            ->render();
    }

    /**
     * @throws ReflectionException
     */
    protected function renderWidget(): string
    {
        $errorTag = '';
        $hintTag = '';
        $inputTag = '';
        $labelTag = '';

        $widget = $this->getWidget();

        if (is_bool($this->ariaDescribedBy) && $this->ariaDescribedBy === true) {
            $widget = $widget->attributes(['aria-describedby' => $this->inputId . '-help']);
        }

        if ('' !== $this->class) {
            $widget = $widget->class($this->class);
        }

        if (($widget instanceof Input\Checkbox || $widget instanceof Input\Radio) && null !== $this->label) {
            $widget = $widget->label(null);
        }

        if ($widget instanceof FormWidgetInterface && $widget instanceof Input\Hidden === false) {
            $errorTag = $this->renderError($widget);
        }

        if ($widget instanceof FormWidgetInterface && $widget instanceof Input\Hidden === false) {
            $hintContent = $this->renderHint($widget) . PHP_EOL;
            $hintTag = match ($this->hintContainer) {
                true => Tag::create('div', $hintContent, $this->hintContainerAttributes) . PHP_EOL,
                false => $hintContent . PHP_EOL,
            };
        }

        $widgetContent = $widget->render();

        if ('' !== $widgetContent) {
            $inputTag = match ($this->inputContainer) {
                true => Tag::create('div', $widgetContent . PHP_EOL, $this->inputContainerAttributes) . PHP_EOL,
                false => $widgetContent . PHP_EOL,
            };
        }

        if ($widget instanceof FormWidgetInterface && $widget instanceof Input\Hidden === false) {
            $labelContent = $this->renderLabel($widget) . PHP_EOL;

            $labelTag = match ($this->labelContainer) {
                true => Tag::create('div', $labelContent, $this->labelContainerAttributes) . PHP_EOL,
                false => $labelContent,
            };
        }

        return preg_replace(
            '/^\h*\v+/m',
            '',
            trim(
                strtr(
                    $this->template,
                    ['{error}' => $errorTag, '{hint}' => $hintTag, '{input}' => $inputTag, '{label}' => $labelTag],
                ),
            ),
        );
    }
}
