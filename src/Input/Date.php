<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use InvalidArgumentException;

use function is_string;

/**
 * The input element with a type attribute whose value is "date" represents a control for setting the element’s value
 * to a string representing a date.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.date.html#input.date
 */
final class Date extends Base\Input
{
    use Base\Attribute\Max;
    use Base\Attribute\Min;
    use Base\Attribute\Step;

    /**
     * @return string the generated input tag.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        $value = match (array_key_exists('value', $attributes)) {
            true => $attributes['value'],
            false => $this->getValue() === '' ? null : $this->getValue(),
        };

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.date.html#input.date.attrs.value
         */
        if (null !== $value && !is_string($value)) {
            throw new InvalidArgumentException($this->getShortNameClass() . ' widget must be a string or null value.');
        }

        $attributes['value'] = $value;

        return $this->input('date', $attributes);
    }
}
