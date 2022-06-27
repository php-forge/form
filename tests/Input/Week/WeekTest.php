<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Week;

use Forge\Form\Input\Week;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class WeekTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="week">',
            Week::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
