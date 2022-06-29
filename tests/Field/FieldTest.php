<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field;

use Forge\Form\Field;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class FieldTest extends TestCase
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
            <label for="propertytypeform-string">String</label>
            <input id="propertytypeform-string" name="PropertyTypeForm[string]" type="checkbox">
            </div>
            HTML,
            Field::create(construct: [new PropertyTypeForm(), 'string'])->checkbox()->render(),
        );
    }
}
