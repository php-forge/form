<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Text;

use Forge\Form\Input\Search;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class SearchAttributesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame(
            '<input id="propertytypeform-string" name="PropertyTypeForm[string]" type="search">',
            Search::create()->for(new PropertyTypeForm(), 'string')->render(),
        );
    }
}
