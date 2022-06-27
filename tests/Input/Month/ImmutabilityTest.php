<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Month;

use Forge\Form\Input\Month;
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
        $month = Month::create();
        $this->assertNotSame($month, $month->max(0));
        $this->assertNotSame($month, $month->min(0));
        $this->assertNotSame($month, $month->step(0));
    }
}
