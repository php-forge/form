<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Time;

use Forge\Form\Input\Time;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class TimeTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="time">',
            Time::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
