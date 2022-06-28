<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Image;

use Forge\Form\Input\Image;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $image = Image::create();
        $this->assertNotSame($image, $image->alt('test.alt'));
        $this->assertNotSame($image, $image->formaction('test.action'));
        $this->assertNotSame($image, $image->formenctype('application/x-www-form-urlencoded'));
        $this->assertNotSame($image, $image->formmethod('post'));
        $this->assertNotSame($image, $image->formnovalidate(true));
        $this->assertNotSame($image, $image->formtarget('_blank'));
        $this->assertNotSame($image, $image->height(100));
        $this->assertNotSame($image, $image->src('test.src'));
        $this->assertNotSame($image, $image->width(100));
    }
}
