<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Support;

use Forge\Model\FormModel;

final class PlaceHolderForm extends FormModel
{
    private string $email = '';
    private int $number = 0;
    private string $password = '';
    private string $search = '';
    private string $telephone = '';
    private string $text = '';
    private string $url = '';

    public function getPlaceHolders(): array
    {
        return [
            'email' => 'Enter your email',
            'number' => 'Enter your number',
            'password' => 'Enter your password',
            'search' => 'Enter your search',
            'telephone' => 'Enter your telephone',
            'text' => 'Enter your text',
            'url' => 'Enter your url',
        ];
    }
}
