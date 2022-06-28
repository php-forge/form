<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Search;

use Forge\Form\Input\Search;
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search" dirname="test.dir">',
            Search::create()->for(new PropertyTypeForm(), 'string')->dirname('test.dir')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMaxLength(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search" maxlength="10">',
            Search::create()->for(new PropertyTypeForm(), 'string')->maxlength(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMinLength(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search" minlength="4">',
            Search::create()->for(new PropertyTypeForm(), 'string')->minlength(4)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPattern(): void
    {
        $expected = <<<'HTML'
        <input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search" title="Only accepts uppercase and lowercase letters." pattern="[A-Za-z]">
        HTML;
        $html = Search::create()
            ->for(new PropertyTypeForm(), 'string')
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search" placeholder="test.placeholder">',
            Search::create()->for(new PropertyTypeForm(), 'string')->placeholder('test.placeholder')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testSize(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search" size="10">',
            Search::create()->for(new PropertyTypeForm(), 'string')->size(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `test.string`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search" value="test.string">',
            Search::create()->for(new PropertyTypeForm(), 'string')->value('test.string')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search">',
            Search::create()->for(new PropertyTypeForm(), 'string')->value(null)->render(),
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search" value="test.string">',
            Search::create()->for($formModel, 'string')->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search">',
            Search::create()->for($formModel, 'string')->render(),
        );
    }
}
