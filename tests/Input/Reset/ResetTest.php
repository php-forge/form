<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Reset;

use Forge\Form\Input\Reset;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ResetTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame('<input type="reset">', Reset::create()->render());
    }
}
