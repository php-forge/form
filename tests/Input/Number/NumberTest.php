<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Number;

use Forge\Form\Input\Number;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class NumberTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="number">',
            Number::create(construct: [new PropertyTypeForm(), 'string'])->render(),
        );
    }
}
