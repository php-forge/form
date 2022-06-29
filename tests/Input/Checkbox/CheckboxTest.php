<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Checkbox;

use Forge\Form\Input\Checkbox;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class CheckboxTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testChecked(): void
    {
        // default value is `false`.
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="checkbox" value="1"> Int',
            Checkbox::create(construct: [new PropertyTypeForm(), 'int'])->value(1)->render(),
        );

        // checked value is `true`.
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="checkbox" value="1" checked> Int',
            Checkbox::create(construct: [new PropertyTypeForm(), 'int'])->checked(true)->value(1)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testHidden(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <input name="PropertyTypeForm[int]" type="hidden" value="0">
            <input id="propertytypeform-int" name="PropertyTypeForm[int]" type="checkbox" value="1"> Int
            HTML,
            Checkbox::create(construct: [new PropertyTypeForm(), 'int'])->hidden('0')->value(1)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="checkbox"> Bool',
            Checkbox::create(construct: [new PropertyTypeForm(), 'bool'])->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutLabel(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="checkbox">',
            Checkbox::create(construct: [new PropertyTypeForm(), 'bool'])->label(null)->render(),
        );
    }
}
