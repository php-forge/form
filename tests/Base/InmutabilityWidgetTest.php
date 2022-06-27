<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Base;

use Forge\Form\Base\Widget;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InmutabilityWidgetTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $widget = $this->createWidget();
        $this->assertNotSame($widget, $widget->for(new PropertyTypeForm(), 'string'));
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
