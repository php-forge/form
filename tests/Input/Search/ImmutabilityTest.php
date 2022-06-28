<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Search;

use Forge\Form\Input\Search;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $search = Search::create();
        $this->assertNotSame($search, $search->dirname('test.dir'));
        $this->assertNotSame($search, $search->maxlength(0));
        $this->assertNotSame($search, $search->minlength(0));
        $this->assertNotSame($search, $search->pattern(''));
        $this->assertNotSame($search, $search->placeholder(''));
        $this->assertNotSame($search, $search->size(0));
    }
}
