<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Text;

use Forge\Form\Input\Text;
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
        $text = Text::create();
        $this->assertNotSame($text, $text->dirname('test.dir'));
        $this->assertNotSame($text, $text->maxlength(0));
        $this->assertNotSame($text, $text->minlength(0));
        $this->assertNotSame($text, $text->pattern(''));
        $this->assertNotSame($text, $text->placeholder(''));
        $this->assertNotSame($text, $text->size(0));
    }
}
