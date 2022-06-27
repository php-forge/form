<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Base;

use Forge\Form\Input\Base\Input;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $input = $this->text();
        $this->assertNotSame($input, $input->ariaDescribedBy(''));
        $this->assertNotSame($input, $input->ariaLabel(''));
        $this->assertNotSame($input, $input->autocomplete('off'));
        $this->assertNotSame($input, $input->disabled());
        $this->assertNotSame($input, $input->form(''));
        $this->assertNotSame($input, $input->list('test.list'));
        $this->assertNotSame($input, $input->readonly());
        $this->assertNotSame($input, $input->required());
        $this->assertNotSame($input, $input->value(''));
    }

    private function text(): Input
    {
        return new class () extends Input {
            protected function run(): string
            {
                return $this->text('input', $this->attributes);
            }
        };
    }
}
