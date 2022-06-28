<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Datetime;

use Forge\Form\Input\Datetime;
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime" max="1996-12-19T16:39:57-08:00">',
            Datetime::create()->for(new PropertyTypeForm(), 'string')->max('1996-12-19T16:39:57-08:00')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMin(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime" min="1996-12-19T16:39:57-08:00">',
            Datetime::create()->for(new PropertyTypeForm(), 'string')->min('1996-12-19T16:39:57-08:00')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStep(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime" step="20">',
            Datetime::create()->for(new PropertyTypeForm(), 'string')->step(20)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `1996-12-19T16:39:57-08:00`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime" value="1996-12-19T16:39:57-08:00">',
            Datetime::create()->for(new PropertyTypeForm(), 'string')->value('1996-12-19T16:39:57-08:00')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime">',
            Datetime::create()->for(new PropertyTypeForm(), 'string')->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `1996-12-19T16:39:57-08:00`.
        $formModel->setValue('string', '1996-12-19T16:39:57-08:00');
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime" value="1996-12-19T16:39:57-08:00">',
            Datetime::create()->for($formModel, 'string')->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime">',
            Datetime::create()->for($formModel, 'string')->render(),
        );
    }
}
