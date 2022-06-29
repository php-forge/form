<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Number;

use Forge\Form\Input\Number;
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
        $this->expectExceptionMessage('Number::class widget must be a numeric or null value.');
        Number::create(construct: [new PropertyTypeForm(), 'array'])->render();
    }
}
