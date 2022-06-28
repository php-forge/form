<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Password;

use Forge\Form\Input\Password;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $password = Password::create();
        $this->assertNotSame($password, $password->maxlength(0));
        $this->assertNotSame($password, $password->minlength(0));
        $this->assertNotSame($password, $password->pattern(''));
        $this->assertNotSame($password, $password->placeholder(''));
        $this->assertNotSame($password, $password->size(0));
    }
}
