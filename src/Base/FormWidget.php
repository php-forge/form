<?php

declare(strict_types=1);

namespace Forge\Form\Base;

use Forge\Form\Exception\AttributeNotSet;
use Forge\Model\Attribute\FormModelAttributes;
use Forge\Model\Contract\FormModelContract;
use Forge\Widget\AbstractWidget;

abstract class FormWidget extends AbstractWidget implements FormWidgetInterface
{
    use Globals;

    private string $charset = 'UTF-8';

    public function __construct(private FormModelContract $formModel, private string $attribute)
    {
        if ($this->formModel->has($this->attribute) === false) {
            throw new AttributeNotSet();
        }
    }

    public function charset(string $value): static
    {
        $new = clone $this;
        $new->charset = $value;

        return $new;
    }

    public function getAttribute(): string
    {
        return $this->attribute;
    }

    public function getCharset(): string
    {
        return $this->charset;
    }

    public function getFormModel(): FormModelContract
    {
        return $this->formModel;
    }

    public function getInputId(): string
    {
        return FormModelAttributes::getInputId($this->getFormModel(), $this->getAttribute(), $this->getCharSet());
    }

    protected function getInputName(): string
    {
        return FormModelAttributes::getInputName($this->getFormModel(), $this->getAttribute());
    }

    protected function getShortNameClass(): string
    {
        return strrchr(static::class, '\\') . '::class';
    }

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

    /**
     * Return if the form is empty.
     */
    private function isEmpty(): bool
    {
        return $this->getFormModel()->isEmpty();
    }
}
