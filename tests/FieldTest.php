<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Field;

use Forge\Form\Field;
use Forge\Form\Input\Text;
use Forge\Form\Tests\Support\BasicForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class FieldTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testAfterField(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="form-group input-group me-3">
            <div class="form-floating flex-grow-1">
            <input class="form-control" id="basicform-username" name="BasicForm[username]" type="text" placeholder="Name">
            <label for="basicform-username">Name</label>
            </div>
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            </div>
            HTML,
            Field::create()
                ->widget(Text::create(construct: [new BasicForm(), 'username'])->placeholder('Name'))
                ->after('<span class="input-group-text"><i class="bi bi-person-fill"></i></span>')
                ->class('form-control')
                ->containerClass('form-group input-group me-3')
                ->inputContainer(true)
                ->inputContainerClass('form-floating flex-grow-1')
                ->inputTemplate('{input}' . PHP_EOL . '{label}')
                ->label('Name')
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testBeforeField(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <div class="form-group input-group me-3">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <div class="form-floating flex-grow-1">
            <input class="form-control" id="basicform-username" name="BasicForm[username]" type="text" placeholder="Name">
            <label for="basicform-username">Name</label>
            </div>
            </div>
            HTML,
            Field::create()
                ->widget(Text::create(construct: [new BasicForm(), 'username'])->placeholder('Name'))
                ->before('<span class="input-group-text"><i class="bi bi-person-fill"></i></span>')
                ->class('form-control')
                ->containerClass('form-group input-group me-3')
                ->inputContainer(true)
                ->inputContainerClass('form-floating flex-grow-1')
                ->inputTemplate('{input}' . PHP_EOL . '{label}')
                ->label('Name')
                ->render(),
        );
    }
}
