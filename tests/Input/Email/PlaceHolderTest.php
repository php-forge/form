<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Email;

use Forge\Form\Input\Email;
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
            '<input id="placeholderform-email" name="PlaceHolderForm[email]" type="email" placeholder="Enter your email">',
            Email::create(construct: [new PlaceHolderForm(), 'email'])->render(),
        );
    }
}
