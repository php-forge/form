<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Month;

use Forge\Form\Input\Month;
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="month" max="1996-12">',
            Month::create(construct: [new PropertyTypeForm(), 'string'])->max('1996-12')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMin(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="month" min="1996-12">',
            Month::create(construct: [new PropertyTypeForm(), 'string'])->min('1996-12')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStep(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="month" step="1">',
            Month::create(construct: [new PropertyTypeForm(), 'string'])->step(1)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `1996-12`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="month" value="1996-12">',
            Month::create(construct: [new PropertyTypeForm(), 'string'])->value('1996-12')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="month">',
            Month::create(construct: [new PropertyTypeForm(), 'string'])->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `1996-12`.
        $formModel->setValue('string', '1996-12');

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="month" value="1996-12">',
            Month::create(construct: [$formModel, 'string'])->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="month">',
            Month::create(construct: [$formModel, 'string'])->render(),
        );
    }
}
