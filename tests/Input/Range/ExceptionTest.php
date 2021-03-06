<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Range;

use Forge\Form\Input\Range;
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
        $this->expectExceptionMessage('Range::class widget must be a numeric or null value.');
        Range::create(construct: [new PropertyTypeForm(), 'array'])->render();
    }
}
