<?php

declare(strict_types=1);

namespace Forge\Form\FieldPart;

use Forge\Html\Helper\CssClass;

trait Label
{
    private null|string $label = '';
    private array $labelAttributes = [];
    private string $labelClass = '';

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
        $new->label = $value;

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
        $new->labelAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the label class is a string that defines the class of the label element.
     *
     * @param string $value The value of the class attribute.
     *
     * @return static
     */
    public function labelClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->labelAttributes, $value);

        return $new;
    }
}
