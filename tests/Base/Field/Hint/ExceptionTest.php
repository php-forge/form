<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Base\Field\Hint;

use Forge\Form\Base\Field\Hint;
use Forge\Form\Exception\AttributeNotSet;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testConstruct(): void
    {
        $this->expectException(AttributeNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because "attribute" is not set or not exists.');
        Hint::create(construct: [new PropertyTypeForm(), '']);
    }

    /**
     * @throws ReflectionException
     */
    public function testTag(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Tag name cannot be empty.');
        Hint::create(construct: [new PropertyTypeForm(), 'string'])->tag('')->render();
    }
}
