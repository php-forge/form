<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Number;

use Forge\Form\Input\Number;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testMax(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="number" max="10">',
            Number::create(construct: [new PropertyTypeForm(), 'string'])->max(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMin(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="number" min="4">',
            Number::create(construct: [new PropertyTypeForm(), 'string'])->min(4)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPlaceholder(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="number" placeholder="test.placeholder">',
            Number::create(construct: [new PropertyTypeForm(), 'string'])->placeholder('test.placeholder')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStep(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="number" step="1">',
            Number::create(construct: [new PropertyTypeForm(), 'string'])->step('1')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `1`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="number" value="1">',
            Number::create(construct: [new PropertyTypeForm(), 'string'])->value('1')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="number">',
            Number::create(construct: [new PropertyTypeForm(), 'string'])->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `1`.
        $formModel->setValue('string', '1');

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="number" value="1">',
            Number::create(construct: [$formModel, 'string'])->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="number">',
            Number::create(construct: [$formModel, 'string'])->render(),
        );
    }
}
