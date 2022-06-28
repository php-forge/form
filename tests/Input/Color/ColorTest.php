<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Color;

use Forge\Form\Input\Color;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ColorTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="color">',
            Color::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
