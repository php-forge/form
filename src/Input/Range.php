<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use InvalidArgumentException;

use function is_numeric;

/**
 * The input element with a type attribute whose value is "range" represents an imprecise control for setting the
 * element’s value to a string representing a number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.range.html
 */
final class Range extends Base\Input
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
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.range.html#input.range.attrs.value
         */
        if (null !== $value &&  !is_numeric($value)) {
            throw new InvalidArgumentException($this->getShortNameClass() . ' widget must be a numeric or null value.');
        }

        $attributes['value'] = $value;

        return $this->input('range', $attributes);
    }
}
