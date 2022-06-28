<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Time;

use Forge\Form\Input\Time;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $time = Time::create();
        $this->assertNotSame($time, $time->max(0));
        $this->assertNotSame($time, $time->min(0));
        $this->assertNotSame($time, $time->step(0));
    }
}
