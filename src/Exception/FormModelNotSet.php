<?php

declare(strict_types=1);

namespace Forge\Form\Exception;

use InvalidArgumentException;

final class FormModelNotSet extends InvalidArgumentException
{
    public function __construct(string $message = '')
    {
        parent::__construct($message ?: $this->getName());
    }

    private function getName(): string
    {
        return 'Failed to create widget because form model is not set.';
    }
}
