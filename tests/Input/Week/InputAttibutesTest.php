<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Week;

use Forge\Form\Input\Week;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttributesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testMax(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="week" max="10">',
            Week::create()->for(new PropertyTypeForm(), 'string')->max(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMin(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="week" min="4">',
            Week::create()->for(new PropertyTypeForm(), 'string')->min(4)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStep(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="week" step="1">',
            Week::create()->for(new PropertyTypeForm(), 'string')->step(1)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `1996-W16`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="week" value="1996-W16">',
            Week::create()->for(new PropertyTypeForm(), 'string')->value('1996-W16')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="week">',
            Week::create()->for(new PropertyTypeForm(), 'string')->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `1996-W16`.
        $formModel->setValue('string', '1996-W16');
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="week" value="1996-W16">',
            Week::create()->for($formModel, 'string')->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="week">',
            Week::create()->for($formModel, 'string')->render(),
        );
    }
}
