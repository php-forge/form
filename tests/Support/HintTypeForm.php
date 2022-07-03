<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Support;

use Forge\Model\FormModel;

final class HintTypeForm extends FormModel
{
    private string $string = '';

    public function getHints(): array
    {
        return [
            'string' => 'Hint for string',
        ];
    }

    public function customError(): string
    {
        return 'This is custom error message.';
    }
}
