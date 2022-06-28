<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Date;

use Forge\Form\Input\Date;
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="date" max="1996-12-19">',
            Date::create()->for(new PropertyTypeForm(), 'string')->max('1996-12-19')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMin(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="date" min="1996-12-19">',
            Date::create()->for(new PropertyTypeForm(), 'string')->min('1996-12-19')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStep(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="date" step="20">',
            Date::create()->for(new PropertyTypeForm(), 'string')->step(20)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `1996-12-19`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="date" value="1996-12-19">',
            Date::create()->for(new PropertyTypeForm(), 'string')->value('1996-12-19')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="date">',
            Date::create()->for(new PropertyTypeForm(), 'string')->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `1996-12-19`.
        $formModel->setValue('string', '1996-12-19');
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="date" value="1996-12-19">',
            Date::create()->for($formModel, 'string')->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="date">',
            Date::create()->for($formModel, 'string')->render(),
        );
    }
}
