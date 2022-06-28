<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Email;

use Forge\Form\Input\Email;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class EmailTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email">',
            Email::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
