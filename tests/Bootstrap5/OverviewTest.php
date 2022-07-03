<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Bootstrap5;

use Forge\Form\Field;
use Forge\Form\Form;
use Forge\Form\Input\Checkbox;
use Forge\Form\Input\Email;
use Forge\Form\Input\Password;
use Forge\Form\Input\Submit;
use Forge\Form\Input\Text;
use Forge\Form\Tests\Support\OverViewForm;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Bootstrap’s form controls expand on our Rebooted form styles with classes. Use these classes to opt into their
 * customized displays for a more consistent rendering across browsers and devices.
 *
 * Be sure to use an appropriate type attribute on all inputs (e.g., email for email address or number for numerical
 * information) to take advantage of newer input controls like email verification, number selection, and more.
 *
 * Here’s a quick example to demonstrate Bootstrap’s form styles. Keep reading for documentation on required classes,
 * form layout, and more.
 *
 * @link https://getbootstrap.com/docs/5.2/forms/overview/#overview
 */
final class OverviewTest extends TestCase
{
    /**
     * Add the disabled boolean attribute on an input to prevent user interactions and make it appear lighter.
     */
    public function testDisabledForms(): void
    {
        $this->assertSame(
            '<input class="form-control" id="propertytypeform-string" name="PropertyTypeForm[string]" type="text" disabled placeholder="Disabled input here...">',
            Field::create()
                ->widget(
                    Text::create(construct: [new PropertyTypeForm(), 'string'])
                        ->disabled()
                        ->placeHolder('Disabled input here...')
                )
                ->container(false)
                ->class('form-control')
                ->label(null)
                ->render(),
        );
    }

    /**
     * Block-level or inline-level form text can be created using .form-text.
     *
     * @throws ReflectionException
     *
     * @link https://getbootstrap.com/docs/5.2/forms/overview/#form-text
     */
    public function testFormText(): void
    {
        $assert = new Assert();
        $config = [
            'class()' => ['form-control'],
            'containerClass()' => ['mb-3'],
            'hintClass()' => ['form-text'],
            'labelClass()' => ['form-label'],
        ];

        $field = Field::create(config: $config);

        /**
         * Associating form text with form controls:
         *
         * Form text should be explicitly associated with the form control it relates to using the aria-describedby
         * attribute. This will ensure that assistive technologies—such as screen readers—will announce this form text
         * when the user focuses or enters the control.
         *
         * Form text below inputs can be styled with `.form-text.` If a block-level element will be used, a top margin
         * is added for easy spacing from the inputs above.
         */
        $assert->equalsWithoutLE(
            <<<HTML
            <div class="mb-3">
            <label class="form-label" for="overviewform-password">Password</label>
            <input class="form-control" id="overviewform-password" name="OverViewForm[password]" type="password" aria-describedby="passwordHelpBlock">
            <div class="form-text" id="passwordHelpBlock">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
            </div>
            HTML,
            $field
                ->widget(
                    Password::create(construct: [new OverViewForm(), 'password'])->ariaDescribedBy('passwordHelpBlock')
                )
                ->hint(
                    'Your password must be 8-20 characters long, contain letters and numbers, and must not contain ' .
                    'spaces, special characters, or emoji.'
                )
                ->render(),
        );

        /**
         * Inline text can use any typical inline HTML element (be it a <span>, <small>, or something else) with nothing
         * more than the `.form-text` class.
         */
        $assert->equalsWithoutLE(
            <<<HTML
            <div class="mb-3 row g-3 align-items-center">
            <div class="col-auto">
            <label class="form-label col-form-label" for="overviewform-password">Password</label>
            </div>
            <div class="col-auto">
            <input class="form-control" id="overviewform-password" name="OverViewForm[password]" type="password" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
            <span class="form-text" id="passwordHelpInline">Must be 8-20 characters long.</span>
            </div>
            </div>
            HTML,
            $field
                ->widget(
                    Password::create(construct: [new OverViewForm(), 'password'])->ariaDescribedBy('passwordHelpInline')
                )
                ->containerClass('row g-3 align-items-center')
                ->class('form-control')
                ->inputContainer(true)
                ->inputContainerClass('col-auto')
                ->labelContainer(true)
                ->labelContainerClass('col-auto')
                ->labelClass('col-form-label')
                ->hint('Must be 8-20 characters long.')
                ->hintContainer(true)
                ->hintContainerClass('col-auto')
                ->hintTag('span')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testOverView(): void
    {
        $assert = new Assert();
        $config = [
            'containerClass()' => ['mb-3'],
            'hintClass()' => ['form-text'],
            'labelClass()' => ['form-label'],
        ];

        $field = Field::create(config: $config);

        $assert->equalsWithoutLE(
            <<<HTML
            <form>
            <div class="mb-3">
            <label class="form-label" for="overviewform-email">Email address</label>
            <input class="form-control" id="overviewform-email" name="OverViewForm[email]" type="email" aria-describedby="emailHelp">
            <div class="form-text" id="emailHelp">
            We'll never share your email with anyone else.
            </div>
            </div>
            <div class="mb-3">
            <label class="form-label" for="overviewform-password">Password</label>
            <input class="form-control" id="overviewform-password" name="OverViewForm[password]" type="password">
            </div>
            <div class="mb-3 form-check">
            <input class="form-check-input" id="overviewform-check" name="OverViewForm[check]" type="checkbox">
            <label class="form-check-label" for="overviewform-check">Check me out</label>
            </div>
            <input class="btn btn-primary" type="submit">
            </form>
            HTML,
            Form::create()->begin() . PHP_EOL .
                $field
                    ->widget(Email::create(construct: [new OverViewForm(), 'email'])
                    ->class('form-control')
                    ->ariaDescribedBy('emailHelp')) . PHP_EOL .
                $field
                    ->widget(Password::create(construct: [new OverViewForm(), 'password']))
                    ->class('form-control') . PHP_EOL .
                $field
                    ->widget(Checkbox::create(construct: [new OverViewForm(), 'check']))
                    ->class('form-check-input')
                    ->containerClass('form-check')
                    ->labelAttributes(['class' => 'form-check-label'])
                    ->template('{input}{label}{hint}{error}') .  PHP_EOL .
                $field->widget(Submit::create()->class('btn btn-primary'))->container(false) . PHP_EOL .
            Form::end()
        );
    }
}
