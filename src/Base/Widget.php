<?php

declare(strict_types=1);

namespace Forge\Form\Base;

use Forge\Form\Exception\AttributeNotSet;
use Forge\Model\Attribute\FormModelAttributes;
use Forge\Model\Contract\FormModelContract;
use Forge\Widget\AbstractWidget;

abstract class Widget extends AbstractWidget
{
    use Globals;

    private string $charset = 'UTF-8';

    public function __construct(private FormModelContract $formModel, private string $attribute)
    {
        if ($this->formModel->has($this->attribute) === false) {
            throw new AttributeNotSet();
        }
    }

    public function getAttribute(): string
    {
        return $this->attribute;
    }

    public function charset(string $value): self
    {
        $new = clone $this;
        $new->charset = $value;

        return $new;
    }

    public function getFormModel(): FormModelContract
    {
        return $this->formModel;
    }

    public function getHint(): string
    {
        return FormModelAttributes::getHint($this->formModel, $this->attribute);
    }

    public function getInputId(): string
    {
        return FormModelAttributes::getInputId($this->formModel, $this->attribute, $this->charset);
    }

    protected function getInputName(): string
    {
        return FormModelAttributes::getInputName($this->formModel, $this->attribute);
    }

    /**
     * Generate label attribute.
     *
     * @return string
     */
    protected function getLabel(): string
    {
        return FormModelAttributes::getLabel($this->formModel, $this->attribute);
    }

    /**
     * Generate placeholder attribute.
     *
     * @return string
     */
    protected function getPlaceHolder(): string
    {
        return FormModelAttributes::getPlaceHolder($this->formModel, $this->attribute);
    }

    protected function getShortNameClass(): string
    {
        return strrchr(static::class, '\\') . '::class';
    }

    /**
     * Return value of attribute.
     *
     * @return mixed
     */
    protected function getValue(): mixed
    {
        return FormModelAttributes::getValue($this->formModel, $this->attribute);
    }

    /**
     * Return if there is a validation error in the attribute.
     *
     * @return bool
     */
    protected function hasError(): bool
    {
        return $this->formModel->error()->has($this->attribute);
    }

    /**
     * Return if the form is empty.
     */
    protected function isValidated(): bool
    {
        return !$this->isEmpty() && !$this->hasError();
    }

    /**
     * Return if the form is empty.
     */
    private function isEmpty(): bool
    {
        return $this->formModel->isEmpty();
    }
}
