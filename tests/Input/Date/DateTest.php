<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Date;

use Forge\Form\Input\Date;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class DateTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="date">',
            Date::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
