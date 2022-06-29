<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Base;

use Forge\Form\Base\Widget;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\Model\Contract\FormModelContract;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InmutabilityGlobalsTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $globals = $this->createWidget(new PropertyTypeForm(), 'string');
        $this->assertNotSame($globals, $globals->autofocus());
        $this->assertNotSame($globals, $globals->class(''));
        $this->assertNotSame($globals, $globals->id(''));
        $this->assertNotSame($globals, $globals->name(''));
        $this->assertNotSame($globals, $globals->tabindex(0));
        $this->assertNotSame($globals, $globals->title(''));
    }

    private function createWidget(FormModelContract $formModel, string $fieldAttributes): Widget
    {
        return new class ($formModel, $fieldAttributes) extends Widget {
            protected function run(): string
            {
                return '';
            }
        };
    }
}
