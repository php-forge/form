<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\File;

use Forge\Form\Input\File;
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
        $file = File::create(construct: [new PropertyTypeForm(), 'string']);
        $this->assertNotSame($file, $file->accept('image/png'));
        $this->assertNotSame($file, $file->hidden('', []));
        $this->assertNotSame($file, $file->multiple());
    }
}
