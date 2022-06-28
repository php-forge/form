<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use Forge\Form\Base\Widget;
use Forge\Html\Helper\Utils;
use Forge\Html\Tag\Tag;

use function is_string;

/**
 * The input element with a type attribute whose value is "file" represents a list of file items, each consisting of a
 * file name, a file type, and a file body (the contents of the file).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.file.html#input.file
 */
final class File extends Base\Input
{
    use Base\Attribute\Accept;
    use Base\Attribute\Multiple;

    private Widget|null $hidden = null;

    /**
     * Returns a new instance with hidden widget that corresponds to "unchecked" state of the input.
     *
     * @param string $value The value of the "unchecked" state.
     * @param array $values The Attribute values indexed by attribute names for hidden widget.
     *
     * @return self
     */
    public function hidden(string $value, array $values = []): self
    {
        $values['value'] = $value;

        $new = clone $this;
        $new->hidden = Hidden::create()->attributes($values)->for($this->getFormModel(), $this->getAttribute());

        return $new;
    }

    /**
     * @return string the generated input tag.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        $name = $this->getInputName();

        if (array_key_exists('name', $attributes) && is_string($attributes['name'])) {
            $name = $attributes['name'];
        }

        // input type="file" not supported value attribute.
        unset($attributes['value']);

        if (!array_key_exists('id', $attributes)) {
            $attributes['id'] = $this->getInputId();
        }

        $attributes['name'] = '' !== $name ? Utils::generateArrayableName($name) : null;
        $attributes['type'] = 'file';

        return match ($this->hidden) {
            null => Tag::create('input', '', $attributes),
            default => $this->hidden->name($name)->render() . PHP_EOL .
                Tag::create('input', '', $attributes),
        };
    }
}
