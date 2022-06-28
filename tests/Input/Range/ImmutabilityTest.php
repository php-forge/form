<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Range;

use Forge\Form\Input\Range;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $range = Range::create();
        $this->assertNotSame($range, $range->max(0));
        $this->assertNotSame($range, $range->min(0));
        $this->assertNotSame($range, $range->step('1'));
    }
}
