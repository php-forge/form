<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field;

use Forge\Form\Field;
use Forge\Form\Input\Reset;
use Forge\Form\Tests\Support\HintTypeForm;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ResetTest extends TestCase
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
            <input type="reset">
            </div>
            HTML,
            Field::create()->widget(Reset::create())->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutContainer(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            '<input type="reset">',
            Field::create()->container(false)->widget(Reset::create())->render(),
        );
    }
}
