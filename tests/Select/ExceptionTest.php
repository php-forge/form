<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Select;

use Forge\Form\Select;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use StdClass;

final class ExceptionTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        $formModel = new PropertyTypeForm();

        // Value object `stdClass`.
        $formModel->setValue('object', new stdClass());

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Select widget value can not be an object.');
        Select::create(construct: [$formModel, 'object'])->render();
    }
}
