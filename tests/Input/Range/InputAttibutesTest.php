<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Range;

use Forge\Form\Input\Range;
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="range" max="10">',
            Range::create()->for(new PropertyTypeForm(), 'string')->max(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMin(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="range" min="4">',
            Range::create()->for(new PropertyTypeForm(), 'string')->min(4)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStep(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="range" step="1">',
            Range::create()->for(new PropertyTypeForm(), 'string')->step('1')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `1`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="range" value="1">',
            Range::create()->for(new PropertyTypeForm(), 'string')->value('1')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="range">',
            Range::create()->for(new PropertyTypeForm(), 'string')->value(null)->render(),
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="range" value="1">',
            Range::create()->for($formModel, 'string')->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="range">',
            Range::create()->for($formModel, 'string')->render(),
        );
    }
}
