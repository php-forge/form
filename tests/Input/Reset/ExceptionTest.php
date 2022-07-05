<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Reset;

use Forge\Form\Input\Reset;
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
        $this->expectExceptionMessage('Reset::class widget must be a string or null value.');
        Reset::create()->value([])->render();
    }
}
