<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use Forge\Form\Base;
use Forge\Html\Tag\Tag;

/**
 * The input element with a type attribute whose value is "checkbox" represents a state or option that can be toggled.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.html
 */
abstract class Input extends Base\FormWidget
{
    use Base\Attribute\AriaDescribedBy;
    use Base\Attribute\AriaLabel;
    use Base\Attribute\Autocomplete;
    use Base\Attribute\Disabled;
    use Base\Attribute\Form;
    use Base\Attribute\Lists;
    use Base\Attribute\Readonlys;
    use Base\Attribute\Required;
    use Base\Attribute\Value;

    protected function input(string $type, array $attributes): string
    {
        $attributes['type'] = $type;

        if (!array_key_exists('id', $attributes)) {
            $attributes['id'] = $this->getInputId();
        }

        if (!array_key_exists('name', $attributes)) {
            $attributes['name'] = $this->getInputName();
        }

        return Tag::create('input', '', $attributes);
    }
}
