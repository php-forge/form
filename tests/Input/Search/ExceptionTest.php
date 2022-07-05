<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Search;

use Forge\Form\Input\Search;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testDirname(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value cannot be empty.');
        Search::create(construct: [new PropertyTypeForm(), 'string'])->dirname('')->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Search::class widget must be a string or null value.');
        Search::create(construct: [new PropertyTypeForm(), 'array'])->render();
    }
}
