<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Time;

use Forge\Form\Input\Time;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $time = Time::create(construct: [new PropertyTypeForm(), 'string']);
        $this->assertNotSame($time, $time->max(0));
        $this->assertNotSame($time, $time->min(0));
        $this->assertNotSame($time, $time->step(0));
    }
}
