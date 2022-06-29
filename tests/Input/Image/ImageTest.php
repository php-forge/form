<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Image;

use Forge\Form\Input\Image;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImageTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="image">',
            Image::create(construct: [new PropertyTypeForm(), 'string'])->render(),
        );
    }
}
