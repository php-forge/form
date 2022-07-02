<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Submit;

use Forge\Form\Input\Submit;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class SubmitTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame('<input type="submit">', Submit::create()->render());
    }
}
