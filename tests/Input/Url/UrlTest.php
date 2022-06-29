<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Url;

use Forge\Form\Input\Url;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class UrlTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="url">',
            Url::create(construct: [new PropertyTypeForm(), 'string'])->render(),
        );
    }
}
