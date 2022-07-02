<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Email;

use Forge\Form\Input\Email;
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email" maxlength="10">',
            Email::create(construct: [new PropertyTypeForm(), 'string'])->maxlength(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMinLength(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email" minlength="4">',
            Email::create(construct: [new PropertyTypeForm(), 'string'])->minlength(4)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMultiple(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email" value="email1@example.com">',
            Email::create(construct: [new PropertyTypeForm(), 'string'])
                ->multiple(false)
                ->value('email1@example.com')
                ->render(),
        );

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email" value="email1@example.com;email2@example.com;" multiple>',
            Email::create(construct: [new PropertyTypeForm(), 'string'])
                ->multiple()
                ->value('email1@example.com;email2@example.com;')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPattern(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}">',
            Email::create(construct: [new PropertyTypeForm(), 'string'])
                ->pattern('[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPlaceholder(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email" placeholder="test.placeholder">',
            Email::create(construct: [new PropertyTypeForm(), 'string'])->placeholder('test.placeholder')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testSize(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email" size="10">',
            Email::create(construct: [new PropertyTypeForm(), 'string'])->size(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `test.string`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email" value="test.string">',
            Email::create(construct: [new PropertyTypeForm(), 'string'])->value('test.string')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email">',
            Email::create(construct: [new PropertyTypeForm(), 'string'])->value(null)->render(),
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email" value="test.string">',
            Email::create(construct: [$formModel, 'string'])->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email">',
            Email::create(construct: [$formModel, 'string'])->render(),
        );
    }
}
