<?php

declare(strict_types=1);

namespace Forge\Form\Tests\ButtonGroup;

use Forge\Form\ButtonGroup;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $buttonGroup = ButtonGroup::create();
        $this->assertNotSame($buttonGroup, $buttonGroup->buttons([]));
        $this->assertNotSame($buttonGroup, $buttonGroup->container(false));
        $this->assertNotSame($buttonGroup, $buttonGroup->containerAttributes([]));
        $this->assertNotSame($buttonGroup, $buttonGroup->containerClass(''));
        $this->assertNotSame($buttonGroup, $buttonGroup->individualButtonAttributes([]));
    }
}
