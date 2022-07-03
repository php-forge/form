<?php

declare(strict_types=1);

namespace Forge\Form\Field\Trait;

use Forge\Html\Helper\CssClass;

trait Hint
{
    private null|string $hint = '';
    private array $hintAttributes = [];
    private string $hintClass = '';
    private bool $hintContainer = false;
    private array $hintContainerAttributes = [];
    private string $hintTag = 'div';

    /**
     * Returns a new instance with the hint text.
     *
     * @param string|null $value The hint text. If null, the hint will be removed.
     *
     * @return self
     */
    public function hint(null|string $value): self
    {
        $new = clone $this;
        $new->hint = $value;

        return $new;
    }

    /**
     * Returns a new instance with the hint attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * ```php
     * ['class' => 'test-class']
     * ```
     *
     * @return static The field widget instance.
     */
    public function hintAttributes(array $values): static
    {
        $new = clone $this;
        $new->hintAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the hint css class.
     *
     * @param string $value The hint class.
     *
     * @return static
     */
    public function hintClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->hintAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the hint container enabled or disabled.
     *
     * @param bool $value True to enable container, false to disable.
     *
     * @return static
     */
    public function hintContainer(bool $value): static
    {
        $new = clone $this;
        $new->hintContainer = $value;

        return $new;
    }

    /**
     * Returns a new instance with the HTML container attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * @return static
     */
    public function hintContainerAttributes(array $values = []): static
    {
        $new = clone $this;
        $new->hintContainerAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with add css class to the container.
     *
     * @param string $value The css class name.
     *
     * @return static
     */
    public function hintContainerClass(string $value): static
    {
        $new = clone $this;
        CssClass::add($new->hintContainerAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the hint tag name.
     *
     * @param string $value The hint tag name.
     *
     * @return static
     */
    public function hintTag(string $value): static
    {
        $new = clone $this;
        $new->hintTag = $value;

        return $new;
    }
}
