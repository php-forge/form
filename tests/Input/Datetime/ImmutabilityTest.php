<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Datetime;

use Forge\Form\Input\Datetime;
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
        $datetime = Datetime::create(construct: [new PropertyTypeForm(), 'string']);
        $this->assertNotSame($datetime, $datetime->max(0));
        $this->assertNotSame($datetime, $datetime->min(0));
        $this->assertNotSame($datetime, $datetime->step(0));
    }
}
