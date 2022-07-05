<?php

declare(strict_types=1);

namespace Forge\Form;

use Forge\Html\Tag\Tag;
use InvalidArgumentException;

use function in_array;
use function is_string;

/**
 * The textarea element represents a multi-line plain-text edit control for the element’s raw value.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html
 */
final class TextArea extends Base\FormWidget
{
    use Base\Attribute\Dirname;
    use Base\Attribute\Disabled;
    use Base\Attribute\Form;
    use Base\Attribute\MaxLength;
    use Base\Attribute\MinLength;
    use Base\Attribute\Placeholder;
    use Base\Attribute\Readonlys;
    use Base\Attribute\Required;

    /**
     * Returns a new instance specifying maximum number of characters per line of text for the UA to show.
     *
     * @param int $value The maximum number of characters per line of text for the UA to show.
     *
     * @return self
     *
     * @link https://html.spec.whatwg.org/multipage/form-elements.html#attr-textarea-cols
     */
    public function cols(int $value): self
    {
        $new = clone $this;
        $new->attributes['cols'] = $value;

        return $new;
    }

    public function content(string $value): self
    {
        $new = clone $this;
        $new->attributes['value'] = $value;

        return $new;
    }

    /**
     * The number of lines of text for the UA to show.
     *
     * @param int $value
     *
     * @return self
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html#textarea.attrs.rows
     */
    public function rows(int $value): self
    {
        $new = clone $this;
        $new->attributes['rows'] = $value;
        return $new;
    }

    /**
     * @param string $value Contains the hard and soft values.
     * `hard` Instructs the UA to insert line breaks into the submitted value of the textarea such that each line has no
     *  more characters than the value specified by the cols attribute.
     * `soft` Instructs the UA to add no line breaks to the submitted value of the textarea.
     *
     * @return self
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html#textarea.attrs.wrap.hard
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/textarea.html#textarea.attrs.wrap.soft
     */
    public function wrap(string $value = 'hard'): self
    {
        if (!in_array($value, ['hard', 'soft'])) {
            throw new InvalidArgumentException('Invalid wrap value. Valid values are: hard, soft.');
        }

        $new = clone $this;
        $new->attributes['wrap'] = $value;
        return $new;
    }

    /**
     * @return string the generated textarea tag.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;
        $content = match (array_key_exists('value', $attributes)) {
            true => $attributes['value'],
            false => $this->getValue() === '' ? '' : $this->getValue(),
        };

        unset($attributes['value']);

        /** @link https://www.w3.org/TR/2012/WD-html-markup-20120329/syntax.html#contents */
        if (!is_string($content) && null !== $content) {
            throw new InvalidArgumentException('TextArea widget must be a string or null value.');
        }

        if (!array_key_exists('id', $attributes)) {
            $attributes['id'] = $this->getInputId();
        }

        if (!array_key_exists('name', $attributes)) {
            $attributes['name'] = $this->getInputName();
        }

        return Tag::create('textarea', (string) $content, $attributes);
    }
}
