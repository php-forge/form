<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field;

use Forge\Form\Field;
use Forge\Form\Input\Hidden;
use Forge\Form\Tests\Support\HintTypeForm;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class HiddenTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <input id="propertytypeform-string" name="PropertyTypeForm[string]" type="hidden">
            </div>
            HTML,
            Field::create()
                ->widget(Hidden::create(construct: [new PropertyTypeForm(), 'string']))
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutContainer(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            '<input id="hinttypeform-string" name="HintTypeForm[string]" type="hidden">',
            Field::create()
                ->container(false)
                ->widget(Hidden::create(construct: [new HintTypeForm(), 'string']))
                ->render()
        );
    }
}
