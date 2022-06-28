<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Week;

use Forge\Form\Input\Week;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $week = Week::create();
        $this->assertNotSame($week, $week->max(0));
        $this->assertNotSame($week, $week->min(0));
        $this->assertNotSame($week, $week->step(0));
    }
}
