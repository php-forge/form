<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field;

use Forge\Form\Field;
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
        $this->expectExceptionMessage('Widget is not set.');
        Field::create()->render();
    }
}
