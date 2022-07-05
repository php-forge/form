<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Form;

use Forge\Form\Form;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttibutesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAutocomplete(): void
    {
        $this->assertSame('<form autocomplete="on">', Form::create()->autocomplete('on')->begin());
    }
}
