<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Input\Submit;

use Forge\Form\Input\Submit;
use Forge\Form\Tests\Support\PropertyTypeForm;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputAttributesTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testFormaction(): void
    {
        $this->assertSame(
            '<input type="submit" formaction="/image.php">',
            Submit::create()->formaction('/image.php')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFormenctype(): void
    {
        $this->assertSame(
            '<input type="submit" formenctype="multipart/form-data">',
            Submit::create()->formenctype('multipart/form-data')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFormmethod(): void
    {
        $this->assertSame(
            '<input type="submit" formn-method="post">',
            Submit::create()->formmethod('post')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFormtarget(): void
    {
        $this->assertSame(
            '<input type="submit" formtarget="_blank">',
            Submit::create()->formtarget('_blank')->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testFormnovalidate(): void
    {
        $this->assertSame('<input type="submit" formnovalidate>', Submit::create()->formnovalidate()->render());
    }
}
