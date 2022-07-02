<?php

declare(strict_types=1);

namespace Forge\Form;

use Forge\Form\Input\Base\InputInterface;
use Forge\Widget\AbstractWidget;
use InvalidArgumentException;
use ReflectionException;

abstract class AbstractField extends AbstractWidget
{
    use Field\Trait\Error;
    use Field\Trait\Hint;
    use Field\Trait\Label;

    private bool|string $ariaDescribedBy = false;
    private bool $container = true;
    private string $inputId = '';
    private string $template = '{label}{input}{hint}{error}';
    private null|AbstractWidget $widget = null;

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

    public function getContainer(): bool
    {
        return $this->container;
    }

    public function getWidget(): AbstractWidget
    {
        if (null === $this->widget) {
            throw new InvalidArgumentException('Widget is not set.');
        }

        return $this->widget;
    }

    public function widget(AbstractWidget $value): static
    {
        $new = clone $this;
        /** @var string */

        $new->ariaDescribedBy = $value->attributes['aria-describedby'] ?? '';
        $new->inputId = $value instanceof InputInterface ? $value->getInputId() : '';
        $new->widget = $value;

        return $new;
    }

    /**
     * @throws ReflectionException
     */
    private function renderError(): string
    {
        $errorAttributes = $this->errorAttributes;
        $widget = $this->getWidget();

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
    private function renderHint(): string
    {
        $hintAttributes = $this->hintAttributes;
        $widget = $this->getWidget();

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
    protected function renderLabel(): string
    {
        $labelAttributes = $this->labelAttributes;
        $widget = $this->getWidget();

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

        if (($widget instanceof Input\Checkbox || $widget instanceof Input\Radio) && null !== $this->label) {
            $widget = $widget->label(null);
        }

        if ($widget instanceof InputInterface && '' !== $this->renderError()) {
            $errorTag = $this->renderError();
        }

        if ($widget instanceof InputInterface && '' !== $this->renderHint()) {
            $hintTag = $this->renderHint() . PHP_EOL;
        }

        if ('' !== $widget->render()) {
            $inputTag = $widget->render() . PHP_EOL;
        }

        if ($widget instanceof InputInterface && '' !== $this->renderLabel()) {
            $labelTag = $this->renderLabel() . PHP_EOL;
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
