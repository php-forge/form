<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use InvalidArgumentException;

use function is_string;

/**
 * The input element with a type attribute whose value is "image" represents either an image from which the UA enables a
 * user to interactively select a pair of coordinates and submit the form, or alternatively a button from which the user
 * can submit the form.
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.image.html#input.image
 */
final class Image extends Base\Input
{
    use Base\Attribute\Formaction;
    use Base\Attribute\Formenctype;
    use Base\Attribute\Formmethod;
    use Base\Attribute\Formnovalidate;
    use Base\Attribute\Formtarget;

    /**
     * Returns a new instances provides a textual label for an alternative button for users and UAs who cannot use the
     * image specified by the src attribute.
     *
     * @param string $value The textual label.
     *
     * @return self
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.image.html#input.image.attrs.alt
     */
    public function alt(string $value): self
    {
        if ('' === $value) {
            throw new InvalidArgumentException('The alt attribute must be empty.');
        }

        $new = clone $this;
        $new->attributes['alt'] = $value;

        return $new;
    }

    /**
     * Returns a new instances specifying the height of the image, in CSS pixels.
     *
     * @param float|int|string $value The height of the image.
     *
     * @return self
     *
     *  @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.image.html#input.image.attrs.height
     */
    public function height(int|float|string $value): self
    {
        $new = clone $this;
        $new->attributes['height'] = $value;

        return $new;
    }

    /**
     * Returns a new instances specifying the location of an image.
     *
     * @param string $value The location of an image.
     *
     * @return self
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.image.html#input.image.attrs.src
     */
    public function src(string $value): self
    {
        $new = clone $this;
        $new->attributes['src'] = $value;

        return $new;
    }

    /**
     * Returns a new instances specifying the width of the image, in CSS pixels.
     *
     * @param float|int|string $value Te width of the image.
     *
     * @return self
     *
     * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.image.html#input.image.attrs.width
     */
    public function width(int|float|string $value): self
    {
        $new = clone $this;
        $new->attributes['width'] = $value;

        return $new;
    }

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
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.image.html#input.image.attrs.src
         */
        if (null !== $value && !is_string($value)) {
            throw new InvalidArgumentException($this->getShortNameClass() . ' widget must be a string or null value.');
        }

        if (!array_key_exists('src', $attributes)) {
            $attributes['src'] = $value;
        }

        unset($attributes['value']);

        return $this->input('image', $attributes);
    }
}
