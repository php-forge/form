<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Tel;

use Forge\Form\Input\Tel;
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
            '<input id="placeholderform-telephone" name="PlaceHolderForm[telephone]" type="tel" placeholder="Enter your telephone">',
            Tel::create(construct: [new PlaceHolderForm(), 'telephone'])->render(),
        );
    }
}
