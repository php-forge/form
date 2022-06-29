<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Number;

use Forge\Form\Input\Number;
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
        $number = Number::create(construct: [new PropertyTypeForm(), 'string']);
        $this->assertNotSame($number, $number->max(0));
        $this->assertNotSame($number, $number->min(0));
        $this->assertNotSame($number, $number->placeholder(''));
        $this->assertNotSame($number, $number->step('1'));
    }
}
