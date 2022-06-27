<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Tel;

use Forge\Form\Input\Tel;
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
        $this->expectExceptionMessage('Tel::class widget must be a string, numeric or null.');
        Tel::create()->for(new PropertyTypeForm(), 'array')->render();
    }
}
