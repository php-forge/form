<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Tel;

use Forge\Form\Input\Tel;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $tel = Tel::create();
        $this->assertNotSame($tel, $tel->maxlength(0));
        $this->assertNotSame($tel, $tel->minlength(0));
        $this->assertNotSame($tel, $tel->pattern(''));
        $this->assertNotSame($tel, $tel->placeholder(''));
        $this->assertNotSame($tel, $tel->size(0));
    }
}
