<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Password;

use Forge\Form\Input\Password;
use Forge\Form\Tests\Support\PlaceHolderForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class PlaceHolderTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="placeholderform-password" name="PlaceHolderForm[password]" type="password" placeholder="Enter your password">',
            Password::create(construct: [new PlaceHolderForm(), 'password'])->render(),
        );
    }
}
