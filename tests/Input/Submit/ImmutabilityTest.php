<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Submit;

use Forge\Form\Input\Submit;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $submit = Submit::create();
        $this->assertNotSame($submit, $submit->formaction('test.action'));
        $this->assertNotSame($submit, $submit->formenctype('application/x-www-form-urlencoded'));
        $this->assertNotSame($submit, $submit->formmethod('post'));
        $this->assertNotSame($submit, $submit->formnovalidate(true));
        $this->assertNotSame($submit, $submit->formtarget('_blank'));
    }
}
