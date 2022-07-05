<?php

declare(strict_types=1);

namespace Forge\Form\Tests;

use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\Form\TextArea;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testContent(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('TextArea widget must be a string or null value.');
        TextArea::create(construct: [new PropertyTypeForm(), 'string'])->attributes(['value' => 1])->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testWrap(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid wrap value. Valid values are: hard, soft.');
        TextArea::create(construct: [new PropertyTypeForm(), 'string'])->wrap('')->render();
    }
}
