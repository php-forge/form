<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Form;

use Forge\Form\Form;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $form = Form::create();
        $this->assertNotSame($form, $form->acceptCharset(''));
        $this->assertNotSame($form, $form->action(''));
        $this->assertNotSame($form, $form->csrf(''));
        $this->assertNotSame($form, $form->enctype('text/plain'));
        $this->assertNotSame($form, $form->method(''));
        $this->assertNotSame($form, $form->noValidate(''));
        $this->assertNotSame($form, $form->target('_blank'));
    }
}
