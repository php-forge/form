<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Color;

use Forge\Form\Input\Color;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Color::class widget must be a string or null value.');
        Color::create(construct: [new PropertyTypeForm(), 'array'])->render();
    }
}
