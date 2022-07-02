<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Password;

use Forge\Form\Input\Password;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class PasswordTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="password">',
            Password::create(construct: [new PropertyTypeForm(), 'string'])->render(),
        );
    }
}
