<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Text;

use Forge\Form\Input\Text;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testDirname(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" dirname="test.dir">',
            Text::create(construct: [new PropertyTypeForm(), 'string'])->dirname('test.dir')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMaxLength(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" maxlength="10">',
            Text::create(construct: [new PropertyTypeForm(), 'string'])->maxlength(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMinLength(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" minlength="4">',
            Text::create(construct: [new PropertyTypeForm(), 'string'])->minlength(4)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPattern(): void
    {
        $expected = <<<'HTML'
        <input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" title="Only accepts uppercase and lowercase letters." pattern="[A-Za-z]">
        HTML;
        $html = Text::create(construct: [new PropertyTypeForm(), 'string'])
            ->pattern('[A-Za-z]')
            ->title('Only accepts uppercase and lowercase letters.')
            ->render();
        $this->assertSame($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testPlaceholder(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" placeholder="test.placeholder">',
            Text::create(construct: [new PropertyTypeForm(), 'string'])->placeholder('test.placeholder')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testSize(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" size="10">',
            Text::create(construct: [new PropertyTypeForm(), 'string'])->size(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `test.string`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" value="test.string">',
            Text::create(construct: [new PropertyTypeForm(), 'string'])->value('test.string')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text">',
            Text::create(construct: [new PropertyTypeForm(), 'string'])->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `test.string`.
        $formModel->setValue('string', 'test.string');

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" value="test.string">',
            Text::create(construct: [$formModel, 'string'])->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);

        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text">',
            Text::create(construct: [$formModel, 'string'])->render(),
        );
    }
}
