<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Widget;

use Forge\Form\Base\Widget;
use Forge\Form\Exception\AttributeNotSet;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\Model\Contract\FormModelContract;
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
        $this->expectException(AttributeNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because "attribute" is not set or not exists.');
        $widget = $this->widget(new PropertyTypeForm(), '');
    }

    /**
     * @throws ReflectionException
     */
    public function testGetAttributeNotExist(): void
    {
        $this->expectException(AttributeNotSet::class);
        $this->expectExceptionMessage('Failed to create widget because "attribute" is not set or not exists.');
        $widget = $this->widget(new PropertyTypeForm(), 'noExist');
    }

    private function widget(FormModelContract $formModel, string $fieldAttributes): Widget
    {
        return new class ($formModel, $fieldAttributes) extends Widget {
            protected function run(): string
            {
                return '';
            }
        };
    }
}
