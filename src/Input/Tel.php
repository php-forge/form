<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use InvalidArgumentException;

use function is_int;
use function is_string;

/**
 * The input element with a type attribute whose value is "tel" represents a one-line plain-text edit control for
 * entering a telephone number.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.tel.html#input.tel
 */
final class Tel extends Base\Input
{
    use Base\Attribute\MaxLength;
    use Base\Attribute\MinLength;
    use Base\Attribute\Pattern;
    use Base\Attribute\Placeholder;
    use Base\Attribute\Size;

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
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.tel.html#input.tel.attrs.value
         */
        if (!is_string($value) && !is_int($value) && null !== $value) {
            throw new InvalidArgumentException(
                $this->getShortNameClass() .  ' widget must be a string, numeric or null.'
            );
        }

        $attributes['value'] = $value;

        return $this->input('tel', $attributes);
    }
}
