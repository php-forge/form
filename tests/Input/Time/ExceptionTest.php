<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Time;

use Forge\Form\Input\Time;
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
        $this->expectExceptionMessage('Time::class widget must be a string or null value.');
        Time::create(construct: [new PropertyTypeForm(), 'array'])->render();
    }
}
