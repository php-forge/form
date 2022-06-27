<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Base;

use Forge\Form\Base\Widget;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InmutabilityGlobalsTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $globals = $this->createWidget();
        $this->assertNotSame($globals, $globals->autofocus());
        $this->assertNotSame($globals, $globals->class(''));
        $this->assertNotSame($globals, $globals->id(''));
        $this->assertNotSame($globals, $globals->name(''));
        $this->assertNotSame($globals, $globals->tabindex(0));
        $this->assertNotSame($globals, $globals->title(''));
    }

    private function createWidget(): Widget
    {
        return new class () extends Widget {
            protected function run(): string
            {
                return '';
            }
        };
    }
}
