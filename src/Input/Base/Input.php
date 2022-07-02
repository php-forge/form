<?php

declare(strict_types=1);

namespace Forge\Form\Input\Base;

use Forge\Form\Base\FormWidget;
use Forge\Html\Tag\Tag;

/**
 * The input element with a type attribute whose value is "checkbox" represents a state or option that can be toggled.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.html
 */
abstract class Input extends FormWidget
{
    use Attribute\AriaDescribedBy;
    use Attribute\AriaLabel;
    use Attribute\Autocomplete;
    use Attribute\Disabled;
    use Attribute\Form;
    use Attribute\Lists;
    use Attribute\Readonlys;
    use Attribute\Required;
    use Attribute\Value;

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
