<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\DateTimeLocal;

use Forge\Form\Input\DatetimeLocal;
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
        $this->expectExceptionMessage('DatetimeLocal::class widget must be a string or null value.');
        DatetimeLocal::create(construct: [new PropertyTypeForm(), 'array'])->render();
    }
}
