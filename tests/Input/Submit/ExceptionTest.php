<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Submit;

use Forge\Form\Input\Submit;
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
        $this->expectExceptionMessage('Submit::class widget must be a string or null value.');
        Submit::create()->value([])->render();
    }
}
