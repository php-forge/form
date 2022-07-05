<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Form;

use Forge\Form\Form;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class FormTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAcceptCharset(): void
    {
        $this->assertSame('<form accept-charset="UTF-8">', Form::create()->acceptCharset('UTF-8')->begin());
    }

    /**
     * @throws ReflectionException
     */
    public function testAction(): void
    {
        $this->assertSame('<form action="/test">', Form::create()->action('/test')->begin());
    }

    /**
     * @throws ReflectionException
     */
    public function testBegin(): void
    {
        $assert = new Assert();

        $this->assertSame('<form>', Form::create()->begin());

        $assert->equalsWithoutLE(
            <<<HTML
            <form action="/example" method="GET">
            <input name="id" type="hidden" value="1">
            <input name="title" type="hidden" value="&lt;">
            HTML,
            Form::create()->action('/example?id=1&title=%3C')->method('GET')->begin(),
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <form action="/foo" method="GET">
            <input name="p" type="hidden">
            HTML,
            Form::create()->action('/foo?p')->method('GET')->begin(),
        );
    }

    /**
     * Data provider for {@see testCsrf()}.
     *
     * @return array test data
     */
    public function dataProviderCsrf(): array
    {
        return [
            // empty csrf name and token
            ['<form action="/foo" method="POST">', 'POST', '', ''],
            // empty csrf token
            ['<form action="/foo" method="POST">', 'POST', '', 'myToken'],
            // only csrf token value
            ['<form action="/foo" method="GET" _csrf="tokenCsrf">', 'GET', 'tokenCsrf', ''],
            // only csrf custom name
            [
                '<form action="/foo" method="POST" myToken="tokenCsrf">' . PHP_EOL .
                '<input name="myToken" type="hidden" value="tokenCsrf">',
                'POST',
                'tokenCsrf',
                'myToken',
            ],
            // object stringable
            [
                '<form action="/foo" method="POST" myToken="tokenCsrf">' . PHP_EOL .
                '<input name="myToken" type="hidden" value="tokenCsrf">',
                'POST',
                new class () {
                    public function __toString(): string
                    {
                        return 'tokenCsrf';
                    }
                },
                'myToken',
            ],
        ];
    }

    /**
     * @dataProvider dataProviderCsrf
     *
     * @param string $expected
     * @param string $method
     * @param string|Stringable $csrfToken
     * @param string $csrfName
     *
     * @throws ReflectionException
     */
    public function testCsrf(string $expected, string $method, $csrfToken, string $csrfName): void
    {
        $formWidget = $csrfName !== ''
            ? Form::create()->action('/foo')->csrf($csrfToken, $csrfName)->method($method)->begin()
            : Form::create()->action('/foo')->csrf($csrfToken)->method($method)->begin();
        $this->assertSame($expected, $formWidget);
    }

    /**
     * @throws ReflectionException
     */
    public function testEnd(): void
    {
        $this->assertSame('</form>', Form::end());
    }

    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $this->assertSame('<form></form>', Form::create()->begin() . Form::end());
    }
}
