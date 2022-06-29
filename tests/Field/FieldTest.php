<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field;

use Forge\Form\Field;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class FieldTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '',
            Field::create(construct: [new PropertyTypeForm(), 'string'])->checkbox()->render(),
        );
    }
}
