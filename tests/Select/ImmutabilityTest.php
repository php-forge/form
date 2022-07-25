<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Select;

use Forge\Form\Select;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\Model\Contract\FormModelContract;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $select = Select::create(construct: [new PropertyTypeForm(), 'int']);
        $this->assertNotSame($select, $select->groups([]));
        $this->assertNotSame($select, $select->items([]));
        $this->assertNotSame($select, $select->itemsAttributes([]));
        $this->assertNotSame($select, $select->prompt(''));
    }
}
