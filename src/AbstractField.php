<?php

declare(strict_types=1);

namespace Forge\Form;

use Forge\Model\Attribute\FormModelAttributes;
use Forge\Model\Contract\FormModelContract;
use Forge\Widget\AbstractWidget;

abstract class AbstractField extends AbstractWidget
{
    private null|string $label = '';
    private array $labelAttributes = [];
    private string $labelClass = '';

    public function __construct(
        protected FormModelContract $formModel,
        protected string $fieldAttribute,
    ) {
    }

    /**
     * Returns a new instance with the label attribute value is a string that defines the text of the label element.
     *
     * @param string $value The value of the label attribute. If null, the label will not be rendered.
     *
     * @return static
     */
    public function label(string $value = null): static
    {
        $new = clone $this;
        $new->label = $label;

        return $new;
    }

    /**
     * Returns a new instance with the label attributes is an array that defines the HTML attributes of the label
     * element.
     *
     * @param array $values The Attribute values indexed by attribute names for field widget.
     */
    public function labelAttributes(array $values): static
    {
        $new = clone $this;
        $new->labelAttributes = $attributes;

        return $new;
    }

    /**
     * Returns a new instance with the label class is a string that defines the class of the label element.
     *
     * @param string $value The value of the class attribute.
     *
     * @return static
     */
    public function labelClass(string $class): static
    {
        $new = clone $this;
        $new->labelClass = $class;

        return $new;
    }

    /**
     * @throws ReflectionException
     */
    protected function renderLabel(): string
    {
        $labelAttributes = $this->labelAttributes;
        $labelClass = $this->labelClass;

        if (!array_key_exists('for', $labelAttributes)) {
            /** @var string */
            $labelAttributes['for'] = FormModelAttributes::getInputId($this->formModel, $this->fieldAttribute);
        }

        if ($labelClass !== '') {
            Html::addCssClass($labelAttributes, $labelClass);
        }

        return Base\Field\Label::create(construct: [$this->formModel, $this->fieldAttribute])
            ->attributes($labelAttributes)
            ->label($this->label)
            ->render() . PHP_EOL;
    }
}
