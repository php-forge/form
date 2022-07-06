<?php

declare(strict_types=1);

namespace Forge\Form\Tests\ButtonGroup;

use Forge\Form\ButtonGroup;
use Forge\Form\Input\Button;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class ButtonGroupTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testContainerAttributes(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="test.class">
            <input type="Submit" value="Submit">
            <input type="Reset" value="Reset">
            </div>
            HTML,
            ButtonGroup::create()
                ->buttons([['label' => 'Submit', 'type' => 'Submit'], ['label' => 'Reset', 'type' => 'Reset']])
                ->containerAttributes(['class' => 'test.class'])
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testContainerClass(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="test.class">
            <input type="Submit" value="Submit">
            <input type="Reset" value="Reset">
            </div>
            HTML,
            ButtonGroup::create()
                ->buttons([['label' => 'Submit', 'type' => 'Submit'], ['label' => 'Reset', 'type' => 'Reset']])
                ->containerClass('test.class')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testIndividualButtonAttributes(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <input class="btn btn-lg" type="Submit" value="Submit">
            <input class="btn btn-md" type="Reset" value="Reset">
            </div>
            HTML,
            ButtonGroup::create()
                ->buttons([['label' => 'Submit', 'type' => 'Submit'], ['label' => 'Reset', 'type' => 'Reset']])
                ->individualButtonAttributes(['0' => ['class' => 'btn btn-lg'], '1' => ['class' => 'btn btn-md']])
                ->render(),
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
            <input type="Submit" value="Submit">
            <input type="Reset" value="Reset">
            </div>
            HTML,
            ButtonGroup::create()
                ->buttons([['label' => 'Submit', 'type' => 'Submit'], ['label' => 'Reset', 'type' => 'Reset']])
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRenderWithTag(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <input type="submit" value="Send">
            <input type="reset" value="Reset">
            </div>
            HTML,
            ButtonGroup::create()
                ->buttons([
                    Button::create()->type('submit')->value('Send'),
                    Button::create()->type('reset')->value('Reset')
                ])
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testVisible(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div>
            <input type="Reset" value="Reset">
            </div>
            HTML,
            ButtonGroup::create()
                ->buttons(
                    [
                        ['label' => 'Submit', 'type' => 'Submit', 'visible' => false],
                        ['label' => 'Reset', 'type' => 'Reset'],
                    ]
                )
                ->render(),
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
            <input type="Submit" value="Submit">
            <input type="Reset" value="Reset">
            HTML,
            ButtonGroup::create()
                ->buttons([['label' => 'Submit', 'type' => 'Submit'], ['label' => 'Reset', 'type' => 'Reset']])
                ->container(false)
                ->render(),
        );
    }
}
