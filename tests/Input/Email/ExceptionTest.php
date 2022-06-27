<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Email;

use Forge\Form\Input\Email;
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
        $this->expectExceptionMessage('Email::class widget must be a string or null value.');
        Email::create()->for(new PropertyTypeForm(), 'array')->render();
    }
}
