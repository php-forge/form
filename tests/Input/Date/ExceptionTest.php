<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Date;

use Forge\Form\Input\Date;
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
        $this->expectExceptionMessage('Date::class widget must be a string or null value.');
        Date::create(construct: [new PropertyTypeForm(), 'array'])->render();
    }
}
