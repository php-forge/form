<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field;

use Forge\Form\Field;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $field = Field::create();
        $this->assertNotSame($field, $field->containerAttributes([]));
        $this->assertNotSame($field, $field->error(''));
        $this->assertNotSame($field, $field->errorAttributes([]));
        $this->assertNotSame($field, $field->errorClass(''));
        $this->assertNotSame($field, $field->errorCallback([]));
        $this->assertNotSame($field, $field->errorTag('div'));
        $this->assertNotSame($field, $field->hint(''));
        $this->assertNotSame($field, $field->hintAttributes([]));
        $this->assertNotSame($field, $field->hintClass(''));
        $this->assertNotSame($field, $field->hintContainer(true));
        $this->assertNotSame($field, $field->hintContainerAttributes([]));
        $this->assertNotSame($field, $field->hintContainerClass(''));
        $this->assertNotSame($field, $field->hintTag('div'));
        $this->assertNotSame($field, $field->inputContainerAttributes([]));
        $this->assertNotSame($field, $field->label(''));
        $this->assertNotSame($field, $field->labelAttributes([]));
        $this->assertNotSame($field, $field->labelClass(''));
        $this->assertNotSame($field, $field->labelContainer(true));
        $this->assertNotSame($field, $field->labelContainerAttributes([]));
        $this->assertNotSame($field, $field->labelContainerClass(''));
    }
}
