<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Radio;

use Forge\Form\Input\Radio;
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
        $radio = Radio::create(construct: [new PropertyTypeForm(), 'string']);
        $this->assertNotSame($radio, $radio->checked(false));
        $this->assertNotSame($radio, $radio->hidden('', []));
        $this->assertNotSame($radio, $radio->label(''));
    }
}
