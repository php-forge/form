<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field\Error;

use Forge\Form\Field\Error;
use Forge\Form\Tests\Support\HintTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $error = Error::create();
        $this->assertNotSame($error, $error->message(''));
        $this->assertNotSame($error, $error->messageCallback([new HintTypeForm(), 'customError']));
        $this->assertNotSame($error, $error->tag(''));
    }
}
