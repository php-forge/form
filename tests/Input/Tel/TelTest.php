<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Tel;

use Forge\Form\Input\Tel;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class TelTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="tel">',
            Tel::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
