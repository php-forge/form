<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Time;

use Forge\Form\Input\Time;
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="time" max="23:20:50.52">',
            Time::create()->for(new PropertyTypeForm(), 'string')->max('23:20:50.52')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMin(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="time" min="23:20:50.52">',
            Time::create()->for(new PropertyTypeForm(), 'string')->min('23:20:50.52')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStep(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="time" step="300">',
            Time::create()->for(new PropertyTypeForm(), 'string')->step(300)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `17:39:57`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="time" value="17:39:57">',
            Time::create()->for(new PropertyTypeForm(), 'string')->value('17:39:57')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="time">',
            Time::create()->for(new PropertyTypeForm(), 'string')->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `17:39:57`.
        $formModel->setValue('string', '17:39:57');
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="time" value="17:39:57">',
            Time::create()->for($formModel, 'string')->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="time">',
            Time::create()->for($formModel, 'string')->render(),
        );
    }
}
