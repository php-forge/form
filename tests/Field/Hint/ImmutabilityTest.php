<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field\Hint;

use Forge\Form\Field\Hint;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $hint = Hint::create();
        $this->assertNotSame($hint, $hint->message(''));
        $this->assertNotSame($hint, $hint->tag(''));
    }
}
