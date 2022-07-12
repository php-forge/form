<?php

declare(strict_types=1);

namespace Forge\Form\Base;

interface PlaceholderInterface
{
    /**
     * Returns a new instances specifying the placeholder attribute.
     *
     * @param string $value The placeholder text.
     *
     * @return static
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#the-placeholder-attribute
     */
    public function placeholder(string $value): self;
}
