<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Url;

use Forge\Form\Input\Url;
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
            '<input id="placeholderform-url" name="PlaceHolderForm[url]" type="url" placeholder="Enter your url">',
            Url::create(construct: [new PlaceHolderForm(), 'url'])->render(),
        );
    }
}
