<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\DatetimeLocal;

use Forge\Form\Input\DateTimeLocal;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ImmutabilityTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testImmutability(): void
    {
        $datetimeLocal = DateTimeLocal::create();
        $this->assertNotSame($datetimeLocal, $datetimeLocal->max(0));
        $this->assertNotSame($datetimeLocal, $datetimeLocal->min(0));
        $this->assertNotSame($datetimeLocal, $datetimeLocal->step(0));
    }
}
