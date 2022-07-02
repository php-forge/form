<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\DatetimeLocal;

use Forge\Form\Input\DatetimeLocal;
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime-local" max="1996-12-19T16:39:57">',
            DatetimeLocal::create(construct: [new PropertyTypeForm(), 'string'])->max('1996-12-19T16:39:57')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMin(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime-local" min="1996-12-19T16:39:57">',
            DatetimeLocal::create(construct: [new PropertyTypeForm(), 'string'])->min('1996-12-19T16:39:57')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testStep(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime-local" step="20">',
            DatetimeLocal::create(construct: [new PropertyTypeForm(), 'string'])->step(20)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `1996-12-19T16:39:57`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime-local" value="1996-12-19T16:39:57">',
            DatetimeLocal::create(construct: [new PropertyTypeForm(), 'string'])
                ->value('1996-12-19T16:39:57')
                ->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime-local">',
            DatetimeLocal::create(construct: [new PropertyTypeForm(), 'string'])->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `1996-12-19T16:39:57`.
        $formModel->setValue('string', '1996-12-19T16:39:57');

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime-local" value="1996-12-19T16:39:57">',
            DatetimeLocal::create(construct: [$formModel, 'string'])->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime-local">',
            DatetimeLocal::create(construct: [$formModel, 'string'])->render(),
        );
    }
}
