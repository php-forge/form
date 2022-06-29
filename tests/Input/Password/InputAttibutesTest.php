<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Password;

use Forge\Form\Input\Password;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testMaxLength(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password" maxlength="10">',
            Password::create(construct: [new PropertyTypeForm(), 'string'])->maxlength(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMinLength(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password" minlength="4">',
            Password::create(construct: [new PropertyTypeForm(), 'string'])->minlength(4)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPattern(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password" title="Only accepts uppercase and lowercase letters." pattern="[A-Za-z]">',
            Password::create(construct: [new PropertyTypeForm(), 'string'])
                ->pattern('[A-Za-z]')
                ->title('Only accepts uppercase and lowercase letters.')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPlaceholder(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password" placeholder="test.placeholder">',
            Password::create(construct: [new PropertyTypeForm(), 'string'])->placeholder('test.placeholder')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testSize(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password" size="10">',
            Password::create(construct: [new PropertyTypeForm(), 'string'])->size(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `test.string`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password" value="test.string">',
            Password::create(construct: [new PropertyTypeForm(), 'string'])->value('test.string')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password">',
            Password::create(construct: [new PropertyTypeForm(), 'string'])->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `test.string`.
        $formModel->setValue('string', 'test.string');

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password" value="test.string">',
            Password::create(construct: [$formModel, 'string'])->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password">',
            Password::create(construct: [$formModel, 'string'])->render(),
        );
    }
}
