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
        $this->assertNotSame($field, $field->error(''));
        $this->assertNotSame($field, $field->errorAttributes([]));
        $this->assertNotSame($field, $field->errorClass(''));
        $this->assertNotSame($field, $field->errorCallback([]));
        $this->assertNotSame($field, $field->errorTag(''));
        $this->assertNotSame($field, $field->hint(''));
        $this->assertNotSame($field, $field->hintAttributes([]));
        $this->assertNotSame($field, $field->hintClass(''));
        $this->assertNotSame($field, $field->hintTag(''));
        $this->assertNotSame($field, $field->label(''));
        $this->assertNotSame($field, $field->labelAttributes([]));
        $this->assertNotSame($field, $field->labelClass(''));
    }
}
