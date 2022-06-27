<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Widget;

use Forge\Form\Base\Widget;
use Forge\Form\Exception\AttributeNotSet;
use Forge\Form\Exception\FormModelNotSet;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionWidgetTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testGetAttributeNotSet(): void
    {
        $widget = $this->widget();
        $this->expectException(AttributeNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because "attribute" is not set or not exists.');
        $widget->for(new PropertyTypeForm(), '');
    }

        /**
     * @throws ReflectionException
     */
    public function testGetAttributeNotExist(): void
    {
        $widget = $this->widget();
        $this->expectException(AttributeNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because "attribute" is not set or not exists.');
        $widget->for(new PropertyTypeForm(), 'noExist');
    }

    /**
     * @throws ReflectionException
     */
    public function testGetFormModelNotSet(): void
    {
        $assert = new Assert();
        $widget = $this->widget();
        $this->expectException(FormModelNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because form model is not set.');
        $assert ->invokeMethod($widget, 'getFormModel');
    }

    private function widget(): Widget
    {
        return new class () extends Widget {
            protected function run(): string
            {
                return '';
            }
        };
    }
}
