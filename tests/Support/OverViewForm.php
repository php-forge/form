<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Support;

use Forge\Model\FormModel;

final class OverViewForm extends FormModel
{
    private string $email = '';
    private string $password = '';
    private bool $check = false;

    public function getLabels(): array
    {
        return [
            'email' => 'Email address',
            'password' => 'Password',
            'check' => 'Check me out',
        ];
    }

    public function getHints(): array
    {
        return [
            'email' => "We'll never share your email with anyone else.",
        ];
    }
}
