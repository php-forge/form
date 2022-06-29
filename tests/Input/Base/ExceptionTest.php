<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Base;

use Forge\Form\Input\Base\Input;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\Model\Contract\FormModelContract;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAutocomplete(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Autocomplete must be "on" or "off".');
        $this->text(new PropertyTypeForm(), 'string')->autocomplete('')->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testList(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value cannot be empty.');
        $this->text(new PropertyTypeForm(), 'string')->list('')->render();
    }

    /**
     * @throws ReflectionException
     */
    public function testStep(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The value must be a number.');
        $this->text(new PropertyTypeForm(), 'string')->step('x')->render();
    }

    private function text(FormModelContract $formModel, string $fieldAttributes): Input
    {
        return new class ($formModel, $fieldAttributes) extends Input {
            use \Forge\Form\Input\Base\Attribute\Step;

            protected function run(): string
            {
                return $this->input('text', $this->attributes);
            }
        };
    }
}
