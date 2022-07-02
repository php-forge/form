<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Range;

use Forge\Form\Input\Range;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class RangeTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="range">',
            Range::create(construct: [new PropertyTypeForm(), 'string'])->render(),
        );
    }
}
