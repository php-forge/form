<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Url;

use Forge\Form\Input\Url;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testMaxLength(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url" maxlength="10">',
            Url::create()->for(new PropertyTypeForm(), 'string')->maxlength(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMinLength(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url" minlength="4">',
            Url::create()->for(new PropertyTypeForm(), 'string')->minlength(4)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testPattern(): void
    {
        $expected = <<<'HTML'
        <input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url" title="Only accepts uppercase and lowercase letters." pattern="[A-Za-z]">
        HTML;
        $html = Url::create()
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
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url" placeholder="test.placeholder">',
            Url::create()->for(new PropertyTypeForm(), 'string')->placeholder('test.placeholder')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testSize(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url" size="10">',
            Url::create()->for(new PropertyTypeForm(), 'string')->size(10)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `https:://example.com`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url" value="https:://example.com">',
            Url::create()->for(new PropertyTypeForm(), 'string')->value('https:://example.com')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url">',
            Url::create()->for(new PropertyTypeForm(), 'string')->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `https:://example.com`.
        $formModel->setValue('string', 'https:://example.com');
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url" value="https:://example.com">',
            Url::create()->for($formModel, 'string')->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url">',
            Url::create()->for($formModel, 'string')->render(),
        );
    }
}
