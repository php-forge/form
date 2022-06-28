<?php

declare(strict_types=1);

namespace Forge\Form\Base;

use Forge\Form\Exception\AttributeNotSet;
use Forge\Form\Exception\FormModelNotSet;
use Forge\Model\Attribute\FormModelAttributes;
use Forge\Model\Contract\FormModelContract;
use Forge\Widget\AbstractWidget;

abstract class Widget extends AbstractWidget
{
    use Globals;

    private string $attribute = '';
    private string $charset = 'UTF-8';
    private ?FormModelContract $formModel = null;

    public function charset(string $value): self
    {
        $new = clone $this;
        $new->charset = $value;

        return $new;
    }

    public function for(FormModelContract $formModel, string $attribute): static
    {
        $new = clone $this;
        $new->formModel = $formModel;
        $new->attribute = match ($new->getFormModel()->has($attribute)) {
            true => $attribute,
            false => throw new AttributeNotSet(),
        };

        return $new;
    }

    protected function getInputId(): string
    {
        return FormModelAttributes::getInputId($this->getFormModel(), $this->getAttribute(), $this->charset);
    }

    protected function getInputName(): string
    {
        return FormModelAttributes::getInputName($this->getFormModel(), $this->getAttribute());
    }

    /**
     * Generate label attribute.
     *
     * @return string
     */
    protected function getLabel(): string
    {
        return FormModelAttributes::getLabel($this->getFormModel(), $this->getAttribute());
    }

    /**
     * Generate placeholder attribute.
     *
     * @return string
     */
    protected function getPlaceHolder(): string
    {
        return FormModelAttributes::getPlaceHolder($this->getFormModel(), $this->getAttribute());
    }

    protected function getShortNameClass(): string
    {
        return strrchr(get_class($this), '\\') . '::class';
    }

    /**
     * Return value of attribute.
     *
     * @return mixed
     */
    protected function getValue(): mixed
    {
        return FormModelAttributes::getValue($this->getFormModel(), $this->getAttribute());
    }

    /**
     * Return if there is a validation error in the attribute.
     *
     * @return bool
     */
    protected function hasError(): bool
    {
        return $this->getFormModel()->error()->has($this->getAttribute());
    }

    /**
     * Return if the form is empty.
     */
    protected function isValidated(): bool
    {
        return !$this->isEmpty() && !$this->hasError();
    }

    protected function getAttribute(): string
    {
        return $this->attribute;
    }

    protected function getFormModel(): FormModelContract
    {
        return match ($this->formModel === null) {
            true => throw new FormModelNotSet(),
            false => $this->formModel,
        };
    }

    /**
     * Return if the form is empty.
     */
    private function isEmpty(): bool
    {
        return $this->getFormModel()->isEmpty();
    }
}
