<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\File;

use Forge\Form\Input\File;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAccept(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string][]" type="file" accept="image/png, image/jpeg">',
            File::create()->for(new PropertyTypeForm(), 'string')->accept('image/png, image/jpeg')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMultiple(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string][]" type="file" multiple>',
            File::create()->for(new PropertyTypeForm(), 'string')->multiple()->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testName(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="test.name[]" type="file">',
            File::create()->for(new PropertyTypeForm(), 'string')->name('test.name')->render(),
        );
    }
}
