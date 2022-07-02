<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field;

use Forge\Form\Field;
use Forge\Form\Input\Email;
use Forge\Form\Tests\Support\HintTypeForm;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class EmailTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAriaDescribedBy(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="hinttypeform-string">String</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email" aria-describedby="hinttypeform-string-help">
            <div id="hinttypeform-string-help">
            Hint for string
            </div>
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new HintTypeForm(), 'string'])->ariaDescribedBy(true))
                ->render()
        );

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="hinttypeform-string">String</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email" aria-describedby="test.ariaDescribedBy">
            <div id="test.ariaDescribedBy">
            Hint for string
            </div>
            </div>
            HTML,
            Field::create()
                ->widget(
                    Email::create(construct: [new HintTypeForm(), 'string'])->ariaDescribedBy('test.ariaDescribedBy')
                )
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testError(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="hinttypeform-string">String</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email">
            <div>
            Hint for string
            </div>
            <div>
            Error for string
            </div>
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new HintTypeForm(), 'string']))
                ->error('Error for string')
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testErrorCustom(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="hinttypeform-string">String</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email">
            <div>
            Hint for string
            </div>
            <article class="test.hint test.hint-1">
            Error for string
            </article>
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new HintTypeForm(), 'string']))
                ->error('Error for string')
                ->errorAttributes(['class' => 'test.hint'])
                ->errorClass('test.hint-1')
                ->errorTag('article')
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testErrorMessageCallback(): void
    {
        $assert = new Assert();
        $formModel = new HintTypeForm();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="hinttypeform-string">String</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email">
            <div>
            Hint for string
            </div>
            <div>
            This is custom error message.
            </div>
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [$formModel, 'string']))
                ->errorCallback([$formModel, 'customError'])
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testHint(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="hinttypeform-string">String</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email">
            <div>
            Hint for string
            </div>
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new HintTypeForm(), 'string']))
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testHintCustom(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="hinttypeform-string">String</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email">
            <article class="test.hint test.hint-1">
            Custom hint for string
            </article>
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new HintTypeForm(), 'string']))
                ->hint('Custom hint for string')
                ->hintAttributes(['class' => 'test.hint'])
                ->hintClass('test.hint-1')
                ->hintTag('article')
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testLabel(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="hinttypeform-string">Label for string</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email">
            <div>
            Hint for string
            </div>
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new HintTypeForm(), 'string']))
                ->label('Label for string')
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testLabelCustom(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label class="test.label test.label-1" for="hinttypeform-string">Label for string</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email">
            <div>
            Hint for string
            </div>
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new HintTypeForm(), 'string']))
                ->label('Label for string')
                ->labelAttributes(['class' => 'test.label'])
                ->labelClass('test.label-1')
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRender(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="propertytypeform-string">String</label>
            <input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email">
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new PropertyTypeForm(), 'string']))
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutContainer(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <label for="hinttypeform-string">String</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email">
            <div>
            Hint for string
            </div>
            HTML,
            Field::create()
                ->container(false)
                ->widget(Email::create(construct: [new HintTypeForm(), 'string']))
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutHint(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <label for="hinttypeform-string">String</label>
            <input id="hinttypeform-string" name="HintTypeForm[string]" type="email">
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new HintTypeForm(), 'string']))
                ->hint(null)
                ->render()
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testWithoutLabel(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <input id="propertytypeform-string" name="PropertyTypeForm[string]" type="email">
            </div>
            HTML,
            Field::create()
                ->widget(Email::create(construct: [new PropertyTypeForm(), 'string']))
                ->label(null)
                ->render()
        );
    }
}
