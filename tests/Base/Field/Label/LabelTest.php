<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Base\Field\Label;

use Forge\Form\Base\Field\Label;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class LabelTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testLabel(): void
    {
        $this->assertSame(
            '<label for="propertytypeform-string">Sam &amp; Dark</label>',
            Label::create(construct: [new PropertyTypeForm(), 'string'])->label('Sam & Dark')->render(),
        );
    }

    /**
     * @throws ReflectionException
     *
     * @link https://github.com/yiisoft/form/issues/85
     */
    public function testLabelWithEncodeFalse(): void
    {
        $this->assertSame(
            '<label for="propertytypeform-string">Sam & Dark</label>',
            Label::create(construct: [new PropertyTypeForm(), 'string'])->label('Sam & Dark', false)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<label for="propertytypeform-string">String</label>',
            Label::create(construct: [new PropertyTypeForm(), 'string'])->render(),
        );
    }
}
