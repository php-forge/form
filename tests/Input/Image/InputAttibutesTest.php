<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Image;

use Forge\Form\Input\Image;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAlt(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" alt="test.alt">',
            Image::create()->for(new PropertyTypeForm(), 'string')->alt('test.alt')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFormaction(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" formaction="/image.php">',
            Image::create()->for(new PropertyTypeForm(), 'string')->formaction('/image.php')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFormenctype(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" formenctype="multipart/form-data">',
            Image::create()->for(new PropertyTypeForm(), 'string')->formenctype('multipart/form-data')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFormmethod(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" formn-method="post">',
            Image::create()->for(new PropertyTypeForm(), 'string')->formmethod('post')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFormtarget(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" formtarget="_blank">',
            Image::create()->for(new PropertyTypeForm(), 'string')->formtarget('_blank')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFormnovalidate(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" formnovalidate>',
            Image::create()->for(new PropertyTypeForm(), 'string')->formnovalidate()->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testHeight(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" height="100">',
            Image::create()->for(new PropertyTypeForm(), 'string')->height(100)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testSrc(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" src="https://image.png">',
            Image::create()->for(new PropertyTypeForm(), 'string')->src('https://image.png')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        // Value string `https://image.png`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" src="https://image.png">',
            Image::create()->for(new PropertyTypeForm(), 'string')->value('https://image.png')->render(),
        );

        // Value `null`.
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image">',
            Image::create()->for(new PropertyTypeForm(), 'string')->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $formModel = new PropertyTypeForm();

        // Value string `https://image.png`.
        $formModel->setValue('string', 'https://image.png');
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" src="https://image.png">',
            Image::create()->for($formModel, 'string')->render(),
        );

        // Value `null`.
        $formModel->setValue('string', null);
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image">',
            Image::create()->for($formModel, 'string')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWidth(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image" width="50.1">',
            Image::create()->for(new PropertyTypeForm(), 'string')->width(50.1)->render(),
        );
    }
}
