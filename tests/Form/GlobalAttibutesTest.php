<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Form;

use Forge\Form\Form;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class GlobalAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testClass(): void
    {
        $this->assertSame('<form class="class">', Form::create()->class('class')->begin());
    }

    /**
     * @throws ReflectionException
     */
    public function testId(): void
    {
        $this->assertSame('<form id="test.id">', Form::create()->id('test.id')->begin());
    }

    /**
     * @throws ReflectionException
     */
    public function testName(): void
    {
        $this->assertSame('<form name="test.name">', Form::create()->name('test.name')->begin());
    }
}
