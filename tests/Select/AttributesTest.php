<?php

declare(strict_types=1);

namespace Forge\Form\Tests\Select;

use Forge\Form\Select;
use Forge\Form\Tests\Support\PropertyTypeForm;
use Forge\TestUtils\Assert;
use PHPUnit\Framework\TestCase;
use ReflectionException;

final class AttributesTest extends TestCase
{
    private array $cities = [
        '1' => 'Moscu',
        '2' => 'San Petersburgo',
        '3' => 'Novosibirsk',
        '4' => 'Ekaterinburgo',
    ];

    /**
     * @throws ReflectionException
     */
    public function testDisabled(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]" disabled>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [new PropertyTypeForm(), 'int'])->disabled()->items($this->cities)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testForm(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]" form="test-form">
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [new PropertyTypeForm(), 'int'])
                ->form('test-form')
                ->items($this->cities)
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testMultiple(): void
    {
        $formModel = new PropertyTypeForm();
        $formModel->setValue('array', [1, 4]);

        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-array" name="PropertyTypeForm[array]" multiple>
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4" selected>Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [$formModel, 'array'])
                ->multiple()
                ->items($this->cities)
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testRequired(): void
    {
        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-array" name="PropertyTypeForm[array]" required>
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [new PropertyTypeForm(), 'array'])
                ->items($this->cities)
                ->required()
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testSizeWithMultiple(): void
    {
        $formModel = new PropertyTypeForm();
        $formModel->setValue('int', 1);

        $assert = new Assert();

        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]" multiple size="3">
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [$formModel, 'int'])
                ->items($this->cities)
                ->multiple()
                ->size(3)
                ->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValue(): void
    {
        $assert = new Assert();

        // Value int `1`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [new PropertyTypeForm(), 'int'])->items($this->cities)->value(1)->render(),
        );

        // Value int `2`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [new PropertyTypeForm(), 'int'])->items($this->cities)->value(2)->render(),
        );

        // Value iterable `[2, 3]`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-array" name="PropertyTypeForm[array]">
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3" selected>Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [new PropertyTypeForm(), 'array'])->items($this->cities)->value([2, 3])->render(),
        );

        // Value string `1`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-string" name="PropertyTypeForm[string]">
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [new PropertyTypeForm(), 'string'])->items($this->cities)->value('1')->render(),
        );

        // Value string `2`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-string" name="PropertyTypeForm[string]">
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [new PropertyTypeForm(), 'string'])->items($this->cities)->value('2')->render(),
        );

        // Value `null`.
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [new PropertyTypeForm(), 'int'])->items($this->cities)->value(null)->render(),
        );
    }

    /**
     * @throws ReflectionException
     */
    public function testValueWithFormModel(): void
    {
        $assert = new Assert();
        $formModel = new PropertyTypeForm();

        // Value int `1`.
        $formModel->setValue('int', 1);
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [$formModel, 'int'])->items($this->cities)->render(),
        );

        // Value int `2`.
        $formModel->setValue('int', 2);
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [$formModel, 'int'])->items($this->cities)->render(),
        );

        // Value iterable `[2, 3]`.
        $formModel->setValue('array', [2, 3]);
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-array" name="PropertyTypeForm[array]">
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3" selected>Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [$formModel, 'array'])->items($this->cities)->render(),
        );

        // Value string `1`.
        $formModel->setValue('string', '1');
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-string" name="PropertyTypeForm[string]">
            <option value="1" selected>Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [$formModel, 'string'])->items($this->cities)->render(),
        );

        // Value string `2`.
        $formModel->setValue('string', 2);
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-string" name="PropertyTypeForm[string]">
            <option value="1">Moscu</option>
            <option value="2" selected>San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [$formModel, 'string'])->items($this->cities)->render(),
        );

        // Value `null`.
        $formModel->setValue('int', null);
        $assert->equalsWithoutLE(
            <<<HTML
            <select id="propertytypeform-int" name="PropertyTypeForm[int]">
            <option value="1">Moscu</option>
            <option value="2">San Petersburgo</option>
            <option value="3">Novosibirsk</option>
            <option value="4">Ekaterinburgo</option>
            </select>
            HTML,
            Select::create(construct: [$formModel, 'int'])->items($this->cities)->render(),
        );
    }
}
