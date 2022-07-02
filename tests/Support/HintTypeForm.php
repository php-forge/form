<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Support;

use Forge\Model\FormModel;

/**
 * @link https://www.php.net/manual/es/language.types.declarations.php
 */
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
