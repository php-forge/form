<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Radio;

use Forge\Form\Input\Radio;
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
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="radio" value="0"> Bool',
            Radio::create(construct: [new PropertyTypeForm(), 'bool'])->value(false)->render(),
        );

        // Value bool `true`.
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="radio" value="1" checked> Bool',
            Radio::create(construct: [new PropertyTypeForm(), 'bool'])->checked(true)->value(true)->render(),
        );

        // Value int `0`.
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="radio" value="0"> Int',
            Radio::create(construct: [new PropertyTypeForm(), 'int'])->value(0)->render(),
        );

        // Value int `1`.
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="radio" value="1" checked> Int',
            Radio::create(construct: [new PropertyTypeForm(), 'int'])->checked(true)->value(1)->render(),
        );

        // Value string `inactive`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="radio" value="inactive"> String',
            Radio::create(construct: [new PropertyTypeForm(), 'string'])->value('inactive')->render(),
        );

        // Value string `active`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="radio" value="active" checked> String',
            Radio::create(construct: [new PropertyTypeForm(), 'string'])->checked(true)->value('active')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="radio"> Bool',
            Radio::create(construct: [new PropertyTypeForm(), 'bool'])->value(null)->render(),
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
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="radio" value="0"> Bool',
            Radio::create(construct: [$formModel, 'bool'])->value(false)->render(),
        );
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="radio" value="1" checked> Bool',
            Radio::create(construct: [$formModel, 'bool'])->value(true)->render(),
        );

        // Value int `1`.
        $formModel->setValue('int', 1);

        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="radio" value="0"> Int',
            Radio::create(construct: [$formModel, 'int'])->value(0)->render(),
        );
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="radio" value="1" checked> Int',
            Radio::create(construct: [$formModel, 'int'])->value(1)->render(),
        );

        // Value string `active`.
        $formModel->setValue('string', 'active');

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="radio" value="inactive"> String',
            Radio::create(construct: [$formModel, 'string'])->value('inactive')->render()
        );

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="radio" value="active" checked> String',
            Radio::create(construct: [$formModel, 'string'])->value('active')->render()
        );

        // Value `null`.
        $formModel->setValue('bool', null);

        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="radio" value="1"> Bool',
            Radio::create(construct: [$formModel, 'bool'])->value(1)->render(),
        );
    }
}
