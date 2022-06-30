<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Base\Field\Label;

use Forge\Form\Base\Field\Label;
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
        $label = Label::create(construct: [new PropertyTypeForm(), 'string']);
        $this->assertNotSame($label, $label->for(''));
        $this->assertNotSame($label, $label->label('', false));
    }
}
