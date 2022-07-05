<?php

declare(strict_types=1);

namespace Forge\Form\Tests\TextArea;

use Forge\Form\TextArea;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAriaLabel(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" aria-label="test.areaLabel"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->ariaLabel('test.areaLabel')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testDirname(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" dirname="test.dir"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->dirname('test.dir')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testDisabled(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" disabled></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->disabled()->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testForm(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" form="test.form"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->form('test.form')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMaxLength(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" maxlength="10"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->maxlength(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMinLength(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" minlength="4"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->minlength(4)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPlaceholder(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" placeholder="test.placeholder"></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->placeholder('test.placeholder')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testReadonly(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" readonly></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->readonly()->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRequired(): void
    {
        $this->assertSame(
            '<textarea id="propertytypeform-string" name="PropertyTypeForm[string]" required></textarea>',
            TextArea::create(construct: [new PropertyTypeForm(), 'string'])->required()->render(),
        );
    }
}
