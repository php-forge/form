<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Radio;

use Forge\Form\Input\Radio;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class RadioTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testChecked(): void
    {
        // default value is `false`.
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="radio" value="1"> Int',
            Radio::create()->for(new PropertyTypeForm(), 'int')->value(1)->render(),
        );

        // checked value is `true`.
        $this->assertSame(
            '<input id="propertytypeform-int" name="PropertyTypeForm[int]" type="radio" value="1" checked> Int',
            Radio::create()->checked(true)->for(new PropertyTypeForm(), 'int')->value(1)->render(),
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
            <input id="propertytypeform-int" name="PropertyTypeForm[int]" type="radio" value="1"> Int
            HTML,
            Radio::create()->for(new PropertyTypeForm(), 'int')->hidden('0')->value(1)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="radio"> Bool',
            Radio::create()->for(new PropertyTypeForm(), 'bool')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutLabel(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-bool" name="PropertyTypeForm[bool]" type="radio">',
            Radio::create()->for(new PropertyTypeForm(), 'bool')->label(null)->render(),
        );
    }
}
