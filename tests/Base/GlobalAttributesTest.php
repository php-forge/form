<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Base;

use Forge\Form\Base\Globals;
use Forge\Form\Base\Widget;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\Html\Tag\Tag;
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
            $this->widget()->autofocus()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testClass(): void
    {
        $this->assertSame(
            '<text class="class">',
            $this->widget()->class('class')->for(new PropertyTypeForm(), 'string')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testId(): void
    {
        $this->assertSame(
            '<text id="test.id">',
            $this->widget()->for(new PropertyTypeForm(), 'string')->id('test.id')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testName(): void
    {
        $this->assertSame(
            '<text name="test.name">',
            $this->widget()->for(new PropertyTypeForm(), 'string')->name('test.name')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testTabIndex(): void
    {
        $this->assertSame(
            '<text tabindex="1">',
            $this->widget()->for(new PropertyTypeForm(), 'string')->tabIndex(1)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testTitle(): void
    {
        $this->assertSame(
            '<text title="test.title">',
            $this->widget()->for(new PropertyTypeForm(), 'string')->title('test.title')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutId(): void
    {
        $this->assertSame('<text>', $this->widget()->for(new PropertyTypeForm(), 'string')->id(null)->render());
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutName(): void
    {
        $this->assertSame('<text>', $this->widget()->for(new PropertyTypeForm(), 'string')->name(null)->render());
    }

    private function widget(): Widget
    {
        return new class () extends Widget {
            protected function run(): string
            {
                return Tag::begin('text', $this->attributes);
            }
        };
    }
}
