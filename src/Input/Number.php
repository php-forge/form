<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use Forge\Form\Base\Attribute;
use InvalidArgumentException;

use function is_numeric;

/**
 * The input element with a type attribute whose value is "range" represents an imprecise control for setting the
 * element’s value to a string representing a number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.number.html
 */
final class Number extends Input
{
    use Attribute\Max;
    use Attribute\Min;
    use Attribute\Placeholder;
    use Attribute\Step;

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
         * @link @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.number.html#input.number.attrs.value
         */
        if (!is_numeric($value) && null !== $value && '' !== $value) {
            throw new InvalidArgumentException($this->getShortNameClass() . ' widget must be a numeric or null value.');
        }

        $attributes['value'] = $value;

        return $this->input('number', $attributes);
    }
}
