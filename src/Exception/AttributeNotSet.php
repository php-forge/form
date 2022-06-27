<?php

declare(strict_types=1);

namespace Forge\Form\Exception;

use InvalidArgumentException;

final class AttributeNotSet extends InvalidArgumentException
{
    public function __construct(string $message = '')
    {
        parent::__construct($message ?: $this->getName());
    }

    private function getName(): string
    {
        return 'Failed to create widget because "attribute" is not set or not exists.';
    }
}
