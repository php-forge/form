<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Checkbox;

use Forge\Form\Input\Checkbox;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $checkbox = Checkbox::create(construct: [new PropertyTypeForm(), 'int']);
        $this->assertNotSame($checkbox, $checkbox->checked(false));
        $this->assertNotSame($checkbox, $checkbox->label(''));
    }
}
