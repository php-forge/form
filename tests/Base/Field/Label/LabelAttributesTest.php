<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Base\Field\Label;

use Forge\Form\Base\Field\Label;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class LabelAttributesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testClass(): void
    {
        $this->assertSame(
            '<label class="test.class" for="propertytypeform-string">String</label>',
            Label::create(construct: [new PropertyTypeForm(), 'string'])->class('test.class')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testForId(): void
    {
        $this->assertSame(
            '<label for="test.forId">Sam &amp; Dark</label>',
            Label::create(construct: [new PropertyTypeForm(), 'string'])->forId('test.forId')->label('Sam & Dark')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testId(): void
    {
        $this->assertSame(
            '<label id="test.id" for="propertytypeform-string">String</label>',
            Label::create(construct: [new PropertyTypeForm(), 'string'])->id('test.id')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testName(): void
    {
        $this->assertSame(
            '<label name="test.name" for="propertytypeform-string">String</label>',
            Label::create(construct: [new PropertyTypeForm(), 'string'])->name('test.name')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testTabIndex(): void
    {
        $this->assertSame(
            '<label for="propertytypeform-string" tabindex="0">String</label>',
            Label::create(construct: [new PropertyTypeForm(), 'string'])->tabindex(0)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testTitle(): void
    {
        $this->assertSame(
            '<label for="propertytypeform-string" title="test.title">String</label>',
            Label::create(construct: [new PropertyTypeForm(), 'string'])->title('test.title')->render(),
        );
    }
}
