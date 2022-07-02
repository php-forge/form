<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Color;

use Forge\Form\Input\Color;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `#ff0000`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="color" value="#ff0000">',
            Color::create(construct: [new PropertyTypeForm(), 'string'])->value('#ff0000')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="color">',
            Color::create(construct: [new PropertyTypeForm(), 'string'])->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `#ff0000`.
        $formModel->setValue('string', '#ff0000');

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="color" value="#ff0000">',
            Color::create(construct: [$formModel, 'string'])->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="color">',
            Color::create(construct: [$formModel, 'string'])->render(),
        );
    }
}
