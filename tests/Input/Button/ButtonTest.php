<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Button;

use Forge\Form\Input\Button;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ButtonTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame('<input type="button">', Button::create()->render());
    }
}
