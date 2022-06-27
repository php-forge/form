<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Week;

use Forge\Form\Input\Week;
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
        $this->expectExceptionMessage('Week::class widget must be a string or null value.');
        Week::create()->for(new PropertyTypeForm(), 'array')->render();
    }
}
