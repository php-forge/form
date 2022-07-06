<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Bootstrap5;

use Forge\Form\Field;
use Forge\Form\Input\Text;
use Forge\Form\Tests\Support\BasicForm;
use Forge\Form\TextArea;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class InputGroupTest extends TestCase
{
    /**
     * Place one add-on or button on either side of an input. You may also place one on both sides of an input. Remember
     * to place <label>s outside the input group.
     *
     * @link https://getbootstrap.com/docs/5.2/forms/input-group/#basic-example
     *
     * @throws ReflectionException
     */
    public function testBasicExample(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input class="form-control" id="basicform-username" name="BasicForm[username]" type="text" aria-describedby="basic-addon1" aria-label="Username" placeholder="Username">
            </div>
            HTML,
            Field::create()
                ->widget(
                    Text::create(construct: [new BasicForm(), 'username'])
                        ->ariaDescribedBy('basic-addon1')
                        ->ariaLabel('Username')
                        ->placeHolder('Username')
                )
                ->beforeInput('<span class="input-group-text" id="basic-addon1">@</span>')
                ->containerClass('input-group mb-3')
                ->class('form-control')
                ->inputTemplate('{beforeInput}' . PHP_EOL . '{input}')
                ->render(),
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="input-group mb-3">
            <input class="form-control" id="basicform-email" name="BasicForm[email]" type="text" aria-describedby="basic-addon2" aria-label="Recipient&apos;s username" placeholder="Recipient&apos;s username">
            <span class="input-group-text" id="basic-addon2">@example.com</span>
            </div>
            HTML,
            Field::create()
                ->widget(
                    Text::create(construct: [new BasicForm(), 'email'])
                        ->ariaDescribedBy('basic-addon2')
                        ->ariaLabel("Recipient's username")
                        ->placeHolder("Recipient's username")
                )
                ->afterInput('<span class="input-group-text" id="basic-addon2">@example.com</span>')
                ->containerClass('input-group mb-3')
                ->class('form-control')
                ->inputTemplate('{input}' . PHP_EOL . '{afterInput}')
                ->render(),
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <label class="form-label" for="basic-url">Your vanity URL</label>
            <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
            <input class="form-control" id="basic-url" name="BasicForm[url]" type="text" aria-describedby="basic-addon3">
            </div>
            HTML,
            Field::create()
                ->widget(
                    Text::create(construct: [new BasicForm(), 'url'])
                        ->ariaDescribedBy('basic-addon3')
                        ->id('basic-url')
                )
                ->beforeInput('<span class="input-group-text" id="basic-addon3">https://example.com/users/</span>')
                ->container(false)
                ->inputContainer(true)
                ->inputContainerClass('input-group mb-3')
                ->class('form-control')
                ->label('Your vanity URL')
                ->labelClass('form-label')
                ->inputTemplate('{beforeInput}' . PHP_EOL . '{input}')
                ->template('{label}' . PHP_EOL . '{field}')
                ->render(),
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="input-group mb-3">
            <span class="input-group-text">$</span>
            <input class="form-control" id="basicform-amount" name="BasicForm[amount]" type="text" aria-label="Amount (to the nearest dollar)">
            <span class="input-group-text">.00</span>
            </div>
            HTML,
            Field::create()
                ->widget(
                    Text::create(construct: [new BasicForm(), 'amount'])->ariaLabel('Amount (to the nearest dollar)')
                )
                ->afterInput('<span class="input-group-text">.00</span>')
                ->beforeInput('<span class="input-group-text">$</span>')
                ->container(false)
                ->inputContainer(true)
                ->inputContainerClass('input-group mb-3')
                ->inputTemplate('{beforeInput}' . PHP_EOL . '{input}' . PHP_EOL . '{afterInput}')
                ->class('form-control')
                ->label(null)
                ->render(),
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="input-group mb-3">
            <input class="form-control" id="basicform-username" name="BasicForm[username]" type="text" aria-label="Username" placeholder="Username">
            <span class="input-group-text">@</span>
            <input class="form-control" id="basicform-server" name="BasicForm[server]" type="text" aria-label="Server" placeholder="Server">
            </div>
            HTML,
            Field::create()
                ->widget(
                    Text::create(construct: [new BasicForm(), 'server'])
                        ->ariaLabel('Server')
                        ->class('form-control')
                        ->placeHolder('Server')
                )
                ->afterInput('<span class="input-group-text">@</span>')
                ->beforeInput(
                    Text::create(construct: [new BasicForm(), 'username'])
                        ->ariaLabel('Username')
                        ->class('form-control')
                        ->placeHolder('Username')
                )
                ->container(false)
                ->inputContainer(true)
                ->inputContainerClass('input-group mb-3')
                ->inputTemplate('{beforeInput}' . PHP_EOL . '{afterInput}' . PHP_EOL . '{input}')
                ->label(null)
                ->render(),
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="input-group">
            <span class="input-group-text">With textarea</span>
            <textarea class="form-control" id="basicform-textarea" name="BasicForm[textArea]" aria-label="With textarea"></textarea>
            </div>
            HTML,
            Field::create()
                ->widget(
                    TextArea::create(construct: [new BasicForm(), 'textArea'])
                        ->ariaLabel('With textarea')
                        ->class('form-control')
                )
                ->beforeInput('<span class="input-group-text">With textarea</span>')
                ->container(false)
                ->inputContainer(true)
                ->inputContainerClass('input-group')
                ->inputTemplate('{beforeInput}' . PHP_EOL . '{input}')
                ->label(null)
                ->render(),
        );
    }
}
