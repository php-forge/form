<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\DateTime;

use Forge\Form\Input\Datetime;
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
        $this->expectExceptionMessage('Datetime::class widget must be a string or null value.');
        Datetime::create()->for(new PropertyTypeForm(), 'array')->render();
    }
}
