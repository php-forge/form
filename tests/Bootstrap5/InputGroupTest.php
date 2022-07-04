<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Bootstrap5;

use Forge\Form\Field;
use Forge\Form\Input\Text;
use Forge\Form\Tests\Support\BasicForm;
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
                ->before('<span class="input-group-text" id="basic-addon1">@</span>')
                ->containerClass('input-group mb-3')
                ->class('form-control')
                ->label(null)
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
                ->after('<span class="input-group-text" id="basic-addon2">@example.com</span>')
                ->containerClass('input-group mb-3')
                ->class('form-control')
                ->label(null)
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
                ->before('<span class="input-group-text" id="basic-addon3">https://example.com/users/</span>')
                ->container(false)
                ->inputContainer(true)
                ->inputContainerClass('input-group mb-3')
                ->class('form-control')
                ->label('Your vanity URL')
                ->labelClass('form-label')
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
                ->after('<span class="input-group-text">.00</span>')
                ->before('<span class="input-group-text">$</span>')
                ->container(false)
                ->inputContainer(true)
                ->inputContainerClass('input-group mb-3')
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
                ->after('<span class="input-group-text">@</span>')
                ->before(
                    Text::create(construct: [new BasicForm(), 'username'])
                        ->ariaLabel('Username')
                        ->class('form-control')
                        ->placeHolder('Username')
                )
                ->container(false)
                ->inputContainer(true)
                ->inputContainerClass('input-group mb-3')
                ->inputTemplate('{before}' . PHP_EOL . '{after}' . PHP_EOL . '{input}')
                ->label(null)
                ->render(),
        );
    }
}
