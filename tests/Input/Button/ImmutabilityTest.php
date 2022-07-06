<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Button;

use Forge\Form\Input\Button;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $button = Button::create();
        $this->assertNotSame($button, $button->type(''));
    }
}
