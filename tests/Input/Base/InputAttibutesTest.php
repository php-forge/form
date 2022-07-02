<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Base;

use Forge\Form\Input\Base\Input;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\Model\Contract\FormModelContract;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAriaDescribedBy(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" aria-describedby="aria-describedby">',
            $this->text(new PropertyTypeForm(), 'string')->ariaDescribedBy('aria-describedby')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testAriaLabel(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" aria-label="aria-label">',
            $this->text(new PropertyTypeForm(), 'string')->ariaLabel('aria-label')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testAutocomplete(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" autocomplete="on">',
            $this->text(new PropertyTypeForm(), 'string')->autocomplete('on')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testDisabled(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" disabled>',
            $this->text(new PropertyTypeForm(), 'string')->disabled()->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testForm(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" form="form">',
            $this->text(new PropertyTypeForm(), 'string')->form('form')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testList(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" list="test.list">',
            $this->text(new PropertyTypeForm(), 'string')->list('test.list')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testReadonly(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" readonly>',
            $this->text(new PropertyTypeForm(), 'string')->readonly()->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRequired(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" required>',
            $this->text(new PropertyTypeForm(), 'string')->required()->render(),
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
            $this->text(new PropertyTypeForm(), 'string')->value('test.string')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="text">',
            $this->text(new PropertyTypeForm(), 'string')->value(null)->render(),
        );
    }

    private function text(FormModelContract $formModel, string $fieldAttributes): Input
    {
        return new class ($formModel, $fieldAttributes) extends Input {
            protected function run(): string
            {
                return $this->input('text', $this->attributes);
            }
        };
    }
}
