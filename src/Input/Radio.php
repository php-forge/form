<?php

declare(strict_types=1);

namespace Forge\Form\Input;

use Forge\Form\Base\FormWidget;
use InvalidArgumentException;

use function ucfirst;

/**
 * The input element with a type attribute whose value is "radio" represents a selection of one item from a list of
 * items (a radio button).
 *
 * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.radio.html#input.radio
 */
final class Radio extends Base\Input
{
    use Base\Attribute\Checked;

    private null|string $label = '';
    private FormWidget|null $hidden = null;

    public function label(null|string $value): self
    {
        $new = clone $this;
        $new->label = $value;

        return $new;
    }

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
        $new->hidden = Hidden::create(construct: [$this->getFormModel(), $this->getAttribute()])->attributes($values);

        return $new;
    }

    /**
     * @return string the generated input tag.
     */
    protected function run(): string
    {
        $attributes = $this->attributes;

        /** @var mixed */
        $value = $this->getValue();

        /** @var mixed */
        $valueDefault = $attributes['value'] ?? null;

        /**
         * @link https://www.w3.org/TR/2012/WD-html-markup-20120329/input.radio.html#input.radio.attrs.value
         */
        if (is_iterable($value) || is_object($value) || is_iterable($valueDefault) || is_object($valueDefault)) {
            throw new InvalidArgumentException(
                $this->getShortNameClass() . ' widget value can not be an iterable or an object.',
            );
        }

        $attributes['checked'] = match (empty($value)) {
            true => $this->checked,
            default => "$value" === "$valueDefault",
        };

        /** @var mixed */
        $attributes['value'] = is_bool($valueDefault) ? (int) $valueDefault : $valueDefault;

        $label = $this->label === '' ? ' ' . ucfirst($this->getAttribute()) : $this->label;
        $radioTag = $this->input('radio', $attributes) . (string) $label;

        return match ($this->hidden) {
            null => $radioTag,
            default => $this->hidden->id(null)->name($this->getInputName())->render() . PHP_EOL . $radioTag,
        };
    }
}
