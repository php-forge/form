<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Number;

use Forge\Form\Input\Number;
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
            '<input id="placeholderform-number" name="PlaceHolderForm[number]" type="number" value="0" placeholder="Enter your number">',
            Number::create(construct: [new PlaceHolderForm(), 'number'])->render(),
        );
    }
}
