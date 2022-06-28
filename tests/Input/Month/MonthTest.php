<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Month;

use Forge\Form\Input\Month;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class MonthTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="month">',
            Month::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
