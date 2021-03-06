<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Date;

use Forge\Form\Input\Date;
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
        $date = Date::create(construct: [new PropertyTypeForm(), 'string']);
        $this->assertNotSame($date, $date->max(0));
        $this->assertNotSame($date, $date->min(0));
        $this->assertNotSame($date, $date->step(0));
    }
}
