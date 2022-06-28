<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use InvalidArgumentException;

use function is_string;

/**
 * The input element with a type attribute whose value is "search" represents a one-line plain-text edit control for
 * entering one or more search terms.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.search.html#input.search
 */
final class Search extends Base\Input
{
    use Base\Attribute\Dirname;
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
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.search.html#input.search.attrs.value
         */
        if (null !== $value && !is_string($value)) {
            throw new InvalidArgumentException($this->getShortNameClass() . ' widget must be a string or null value.');
        }

        $attributes['value'] = $value;

        return $this->input('search', $attributes);
    }
}
