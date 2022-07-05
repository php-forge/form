<?php

declare(strict_types=1);

namespace Forge\Form\Tests\TextArea;

use Forge\Form\TextArea;
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
        $textArea = TextArea::create(construct: [new PropertyTypeForm(), 'string']);
        $this->assertNotSame($textArea, $textArea->cols(10));
        $this->assertNotSame($textArea, $textArea->rows(1));
        $this->assertNotSame($textArea, $textArea->wrap());
    }
}
