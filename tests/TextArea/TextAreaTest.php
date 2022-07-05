<?php

declare(strict_types=1);

namespace Forge\Form\Tests\TextArea;

use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\Form\TextArea;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class TextTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testCols(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" cols="20"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->cols(20)->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testContent(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" cols="20">test.content</textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->cols(20)->content('test.content')->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRows(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" rows="2"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->rows(2)->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWrap(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" wrap="hard"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->wrap()->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWrapWithSoft(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" wrap="soft"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->wrap('soft')->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->render(),
        );
    }
}
