<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Checkbox;

use Forge\Form\Input\Checkbox;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttributesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value bool `false`.
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="checkbox" value="0"> Bool',
            Checkbox::create(construct: [new PropertyTypeForm(), 'bool'])->value(false)->render(),
        );

        // Value bool `true`.
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="checkbox" value="1" checked> Bool',
            Checkbox::create(construct: [new PropertyTypeForm(), 'bool'])->checked(true)->value(true)->render(),
        );

        // Value int `0`.
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="checkbox" value="0"> Int',
            Checkbox::create(construct: [new PropertyTypeForm(), 'int'])->value(0)->render(),
        );

        // Value int `1`.
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="checkbox" value="1" checked> Int',
            Checkbox::create(construct: [new PropertyTypeForm(), 'int'])->checked(true)->value(1)->render(),
        );

        // Value string `inactive`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="checkbox" value="inactive"> String',
            Checkbox::create(construct: [new PropertyTypeForm(), 'string'])->value('inactive')->render(),
        );

        // Value string `active`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="checkbox" value="active" checked> String',
            Checkbox::create(construct: [new PropertyTypeForm(), 'string'])->checked(true)->value('active')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="checkbox"> Bool',
            Checkbox::create(construct: [new PropertyTypeForm(), 'bool'])->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value bool `true`.
        $formModel->setValue('bool', true);

        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="checkbox" value="0"> Bool',
            Checkbox::create(construct: [$formModel, 'bool'])->value(false)->render(),
        );
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="checkbox" value="1" checked> Bool',
            Checkbox::create(construct: [$formModel, 'bool'])->value(true)->render(),
        );

        // Value int `1`.
        $formModel->setValue('int', 1);

        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="checkbox" value="0"> Int',
            Checkbox::create(construct: [$formModel, 'int'])->value(0)->render(),
        );
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="checkbox" value="1" checked> Int',
            Checkbox::create(construct: [$formModel, 'int'])->value(1)->render(),
        );

        // Value string `active`.
        $formModel->setValue('string', 'active');

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="checkbox" value="inactive"> String',
            Checkbox::create(construct: [$formModel, 'string'])->value('inactive')->render()
        );

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="checkbox" value="active" checked> String',
            Checkbox::create(construct: [$formModel, 'string'])->value('active')->render()
        );

        // Value `null`.
        $formModel->setValue('bool', null);

        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="checkbox" value="1"> Bool',
            Checkbox::create(construct: [$formModel, 'bool'])->value(1)->render(),
        );
    }
}
