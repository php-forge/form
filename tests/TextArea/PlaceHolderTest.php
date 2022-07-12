<?php

declare(strict_types=1);

namespace Forge\Form\Tests\TextArea;

use Forge\Form\TextArea;
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
            '<textarea id="placeholderform-text" name="PlaceHolderForm[text]" placeholder="Enter your text"></textarea>',
            TextArea::create(construct: [new PlaceHolderForm(), 'text'])->render(),
        );
    }
}
