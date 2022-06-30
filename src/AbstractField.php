<?php

declare(strict_types=1);

namespace Forge\Form;

use Forge\Form\Base\Widget;
use Forge\Model\Attribute\FormModelAttributes;
use Forge\Widget\AbstractWidget;
use InvalidArgumentException;
use ReflectionException;

abstract class AbstractField extends AbstractWidget
{
    use FieldPart\Error;
    use FieldPart\Hint;
    use FieldPart\Label;

    private bool $ariaDescribedBy = false;
    private bool $container = true;
    private string $template = '{label}{input}{hint}{error}';
    private null|Widget $widget = null;

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

    public function getWidget(): Widget
    {
        if (null === $this->widget) {
            throw new InvalidArgumentException('Widget is not set.');
        }

        return $this->widget;
    }

    public function widget(Widget $value): static
    {
        $new = clone $this;
        $new->widget = $value;

        return $new;
    }

    /**
     * @throws ReflectionException
     */
    private function renderError(): string
    {
        $errorAttributes = $this->errorAttributes;
        $widget = $this->widget;

        return Base\Field\Error::create(construct: [$widget->getFormModel(), $widget->getAttribute()])
            ->attributes($errorAttributes)
            ->message($this->error)
            ->messageCallback($this->errorCallback)
            ->tag($this->errorTag)
            ->render();
    }

    /**
     * @throws ReflectionException
     */
    private function renderHint(): string
    {
        $hintAttributes = $this->hintAttributes;
        $widget = $this->getWidget();

        /** @var bool|string */
        $ariaDescribedBy = $widget->attributes['aria-describedby'] ?? '';

        if (is_bool($ariaDescribedBy) && $ariaDescribedBy === true) {
            $id = $widget->getInputId() . '-help';
            $widget->attributes['aria-describedby'] = $id;
            $hintAttributes['id'] = $id;
        }

        if (is_string($ariaDescribedBy) && $ariaDescribedBy !== '') {
            /** @var string */
            $hintAttributes['id'] = $widget->attributes['aria-describedby'];
        }

        return Base\Field\Hint::create(construct: [$widget->getFormModel(), $widget->getAttribute()])
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

        return Base\Field\Label::create(construct: [$widget->getFormModel(), $widget->getAttribute()])
            ->attributes($labelAttributes)
            ->label($this->label)
            ->render() . PHP_EOL;
    }

    /**
     * @throws ReflectionException
     */
    protected function renderInputWidget(): string
    {
        $errorTag = '';
        $hintTag = '';
        $inputTag = '';
        $labelTag = '';

        $widget = $this->getWidget();

        if ($this->renderError() !== '') {
            $errorTag = $this->renderError();
        }

        if ($this->renderHint() !== '') {
            $hintTag = $this->renderHint() . PHP_EOL;
        }

        if ($widget->render() !== '') {
            $inputTag = $widget->render() . PHP_EOL;
        }

        if ($this->renderLabel() !== '') {
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
