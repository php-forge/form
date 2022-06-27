<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Hidden;

use Forge\Form\Input\Hidden;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class HiddenTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="hidden">',
            Hidden::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
