<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Datetime;

use Forge\Form\Input\Datetime;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class DatetimeTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime">',
            Datetime::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
