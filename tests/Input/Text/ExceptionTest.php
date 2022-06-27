<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Text;

use Forge\Form\Input\Text;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testDirnameException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value cannot be empty.');
        Text::create()->for(new PropertyTypeForm(), 'string')->dirname('')->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testValueException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Text::class widget must be a string or null value.');
        Text::create()->for(new PropertyTypeForm(), 'array')->render();
    }
}
