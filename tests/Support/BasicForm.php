<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Support;

use Forge\Model\FormModel;

final class BasicForm extends FormModel
{
    private string $amount = '';
    private string $email = '';
    private string $url = '';
    private string $username = '';
    private string $server = '';
    private string $textArea = '';
}
