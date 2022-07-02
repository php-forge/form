<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use Forge\Form\Base\FormWidget;
use Forge\Html\Tag\Tag;
use InvalidArgumentException;

use function is_string;

/**
 * The input element with a type attribute whose value is "hidden" represents a value that is not intended to be
 * examined or manipulated by the user.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.hidden.html#input.hidden.attrs.value
 */
final class Hidden extends FormWidget
{
    use Base\Attribute\Disabled;
    use Base\Attribute\Form;
    use Base\Attribute\Value;

    /**
     * @return string the generated input tag.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;

        if (!array_key_exists('id', $attributes)) {
            $attributes['id'] = $this->getInputId();
        }

        if (!array_key_exists('name', $attributes)) {
            $attributes['name'] = $this->getInputName();
        }

        $value = match (array_key_exists('value', $attributes)) {
            true => $attributes['value'],
            false => $this->getValue() === '' ? null : $this->getValue(),
        };

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.hidden.html#input.hidden.attrs.value
         */
        if (null !== $value && !is_string($value)) {
            throw new InvalidArgumentException($this->getShortNameClass() . ' widget must be a string or null value.');
        }

        $attributes['type'] = 'hidden';
        $attributes['value'] = $value;

        return Tag::create('input', '', $attributes);
    }
}
