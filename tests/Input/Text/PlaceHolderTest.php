<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Text;

use Forge\Form\Input\Text;
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
            '<input id="placeholderform-text" name="PlaceHolderForm[text]" type="text" placeholder="Enter your text">',
            Text::create(construct: [new PlaceHolderForm(), 'text'])->render(),
        );
    }
}
