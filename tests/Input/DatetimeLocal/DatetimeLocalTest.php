<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\DatetimeLocal;

use Forge\Form\Input\DatetimeLocal;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class DatetimeLocalTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="datetime-local">',
            DatetimeLocal::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
