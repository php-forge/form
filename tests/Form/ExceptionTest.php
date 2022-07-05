<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Form;

use Forge\Form\Form;
use Forge\Form\Tests\Support\PropertyTypeForm;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class TextAreaTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testEnctype(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The formenctype attribute must be one of the following values: ' .
            '"multipart/form-data", "application/x-www-form-urlencoded", "text/plain"'
        );
        Form::create()->enctype('')->begin();
    }

    /**
     * @throws ReflectionException
     */
    public function testTarget(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The formtarget attribute value must be one of "_blank", "_self", "_parent" or "_top"'
        );
        Form::create()->target('')->begin();
    }
}
