<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Base;

use Forge\Form\Base\Widget;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\Html\Tag\Tag;
use Forge\Model\Contract\FormModelContract;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class GlobalAttributesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAutofocus(): void
    {
        $this->assertSame(
            '<text autofocus>',
            $this->widget(new PropertyTypeForm(), 'string')->autofocus()->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testClass(): void
    {
        $this->assertSame(
            '<text class="class">',
            $this->widget(new PropertyTypeForm(), 'string')->class('class')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testId(): void
    {
        $this->assertSame(
            '<text id="test.id">',
            $this->widget(new PropertyTypeForm(), 'string')->id('test.id')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testName(): void
    {
        $this->assertSame(
            '<text name="test.name">',
            $this->widget(new PropertyTypeForm(), 'string')->name('test.name')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testTabIndex(): void
    {
        $this->assertSame(
            '<text tabindex="1">',
            $this->widget(new PropertyTypeForm(), 'string')->tabIndex(1)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testTitle(): void
    {
        $this->assertSame(
            '<text title="test.title">',
            $this->widget(new PropertyTypeForm(), 'string')->title('test.title')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutId(): void
    {
        $this->assertSame('<text>', $this->widget(new PropertyTypeForm(), 'string')->id(null)->render());
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutName(): void
    {
        $this->assertSame('<text>', $this->widget(new PropertyTypeForm(), 'string')->name(null)->render());
    }

    private function widget(FormModelContract $formModel, string $fieldAttributes): Widget
    {
        return new class ($formModel, $fieldAttributes) extends Widget {
            protected function run(): string
            {
                return Tag::begin('text', $this->attributes);
            }
        };
    }
}
