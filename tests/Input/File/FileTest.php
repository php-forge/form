<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\File;

use Forge\Form\Input\File;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class FileTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testHidden(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <input id="propertytypeform-string" name="PropertyTypeForm[string]" type="hidden" value="0">
            <input id="propertytypeform-string" name="PropertyTypeForm[string][]" type="file">
            HTML,
            File::create(construct: [new PropertyTypeForm(), 'string'])->hidden('0')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string][]" type="file">',
            File::create(construct: [new PropertyTypeForm(), 'string'])->render(),
        );
    }
}
