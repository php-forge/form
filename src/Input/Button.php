<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use Forge\Form\Base\Globals;
use Forge\Html\Tag\Tag;
use Forge\Widget\AbstractWidget;
use InvalidArgumentException;

use function is_string;

/**
 * The input element with a type attribute whose value is "button" represents a button with no additional semantics.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.button.html#input.button
 */
final class Button extends AbstractWidget
{
    use Base\Attribute\Disabled;
    use Base\Attribute\Form;
    use Base\Attribute\Value;
    use Globals;

    /**
     * @return string the generated input tag.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        $value = $attributes['value'] ?? null;

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.button.html#input.button.attrs.value
         */
        if (null !== $value && !is_string($value)) {
            throw new InvalidArgumentException($this->getShortNameClass() . ' widget must be a string or null value.');
        }

        $attributes['type'] = 'button';
        $attributes['value'] = $value;

        return Tag::create('input', '', $attributes);
    }

    private function getShortNameClass(): string
    {
        return strrchr(self::class, '\\') . '::class';
    }
}
