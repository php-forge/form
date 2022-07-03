<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Support;

use Forge\Model\FormModel;

final class PropertyTypeForm extends FormModel
{
    private ?array $array = [];
    private bool|null $bool = null;
    private float $float = 0;
    private ?int $int = null;
    private iterable $iterable = [];
    private mixed $nullable = null;
    private ?int $number = null;
    private ?object $object = null;
    private string $string = '';
}
