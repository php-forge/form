<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Button;

use Forge\Form\Input\button;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testValueException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Button::class widget must be a string or null value.');
        Button::create()->value([])->render();
    }
}
