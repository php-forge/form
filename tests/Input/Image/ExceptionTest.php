<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Image;

use Forge\Form\Input\Image;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAlt(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The alt attribute must be empty.');
        Image::create(construct: [new PropertyTypeForm(), 'string'])->alt('')->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testFormaction(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The formaction attribute must be empty.');
        Image::create(construct: [new PropertyTypeForm(), 'string'])->formaction('')->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testFormenctype(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The formenctype attribute must be one of the following values: ' .
            '"multipart/form-data", "application/x-www-form-urlencoded", "text/plain"'
        );
        Image::create(construct: [new PropertyTypeForm(), 'string'])->formenctype('')->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testFormmethod(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The formnMethod attribute must be either "get" or "post".');
        Image::create(construct: [new PropertyTypeForm(), 'string'])->formmethod('')->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testFormtarget(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The formtarget attribute value must be one of "_blank", "_self", "_parent" or "_top"'
        );
        Image::create(construct: [new PropertyTypeForm(), 'string'])->formtarget('')->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testValueException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Image::class widget must be a string or null value.');
        Image::create(construct: [new PropertyTypeForm(), 'array'])->render();
    }
}
