<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Search;

use Forge\Form\Input\Search;
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
            '<input id="placeholderform-search" name="PlaceHolderForm[search]" type="search" placeholder="Enter your search">',
            Search::create(construct: [new PlaceHolderForm(), 'search'])->render(),
        );
    }
}
