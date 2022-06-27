<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use InvalidArgumentException;

use function is_string;

/**
 * The input element with a type attribute whose value is "datetime-local" represents a control for setting the
 * element’s value to a string representing a local date and time (with no timezone information).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.datetime-local.html#input.datetime-local
 */
final class DatetimeLocal extends Base\Input
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
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.datetime-local.html#input.datetime-local.attrs.value
         */
        if (null !== $value && !is_string($value)) {
            throw new InvalidArgumentException($this->getShortNameClass() . ' widget must be a string or null value.');
        }

        $attributes['value'] = $value;

        return $this->input('datetime-local', $attributes);
    }
}
