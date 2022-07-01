<?php

declare(strict_types=1);

namespace Forge\Form\Field;

use Forge\Form\Base\Widget;
use Forge\Form\Input\Base\Attribute\Form;
use Forge\Html\Helper\Encode;
use Forge\Html\Tag\Tag;

/**
 * The label element represents a caption for a form control.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/label.html
 */
final class Label extends Widget
{
    use Form;

    private null|string $label = '';

    /**
     * Returns a new instance with the id of a labelable form-related element in the same document as the tag label
     * element.
     *
     * The first element in the document with an id matching the value of the for attribute is the labeled control for
     * this label element, if it is a labelable element.
     *
     * @param string $value The id of a labelable form-related element in the same document as the tag label
     * element. If null, the attribute will be removed.
     *
     * @return self
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/label.html#label.attrs.for
     */
    public function for(string $value): self
    {
        $new = clone $this;
        $new->attributes['for'] = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying the label to be displayed.
     *
     * @param string|null $value The label to be displayed.
     * @param bool $encode Whether to encode the label.
     *
     * @return static
     */
    public function label(null|string $value, bool $encode = true): self
    {
        $new = clone $this;
        $new->label = $encode && null !== $value ? Encode::content($value) : $value;

        return $new;
    }

    /**
     * @return string the generated label tag.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        $label = $this->label;

        if ($label === '') {
            $label = Encode::content($this->getLabel());
        }

        /** @var string */
        if (!array_key_exists('for', $attributes)) {
            $attributes['for'] = $this->getInputId();
        }

        return match ($label) {
            null => '',
            default => Tag::create('label', $label, $attributes),
        };
    }
}
