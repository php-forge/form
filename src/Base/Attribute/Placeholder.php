<?php

declare(strict_types=1);

namespace Forge\Form\Base\Attribute;

trait Placeholder
{
    public function placeholder(string $value): static
    {
        $new = clone $this;
        $new->attributes['placeholder'] = $value;

        return $new;
    }
}
