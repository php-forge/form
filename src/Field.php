<?php

declare(strict_types=1);

namespace Forge\Form;

use Forge\Html\Tag\Tag;
use ReflectionException;

use function array_key_exists;
use function array_merge;
use function strtr;

/**
 * Renders the field widget along with label and hint tag (if any) according to template.
 */
final class Field extends AbstractField
{
    private bool $container = true;
    private string $id = '';
    private array $parts = [];
    private string $template = '{label}{input}';

    /**
     * Renders a checkbox.
     *
     * This method will generate the `checked` tag attribute according to the model attribute value.
     *
     * @param bool $enclosedByLabel whether to render the checkbox enclosed by the label tag.
     * @param string $label the label tag. If null, the label will not be rendered.
     *
     * Available methods:
     * [
     *     'label()' => [$label, $encode], // label of the checkbox, $encode is boolean, whether to encode the label.
     *     'hidden() => [$value, $attributes], // value of the hidden input, $attributes is array of attributes.
     * ]
     *
     * @throws ReflectionException
     *
     * @return self The field widget instance.
     */
    public function checkbox(bool $enclosedByLabel = true, string $label = null, array $config = []): self
    {
        $new = clone $this;
        $checkboxTag = Input\Checkbox::create(
            config: $config,
            construct: [$this->formModel, $this->fieldAttribute],
        );

        $checkboxTag = match ($enclosedByLabel) {
            true => $checkboxTag->label($label),
            false => $checkboxTag,
        };

        $new->parts['{input}'] = $checkboxTag->render();

        return $new;
    }

    /**
     * Renders the whole field.
     *
     * This method will generate the label, input tag and hint tag (if any), and assemble them into HTML according to
     * {@see template}.
     *
     * If (not set), the default methods will be called to generate the label and input tag, and use them as the
     * content.
     *
     * @throws ReflectionException
     *
     * @return string The rendering result.
     */
    protected function run(): string
    {
        $content = '';

        $content .= $this->renderInputWidget();

        return $this->container ? Tag::create('div', $content, []) : $content;
    }

    /**
     * @throws ReflectionException
     */
    private function renderError(): string
    {
        $errorAttributes = $this->getErrorAttributes();
        $errorClass = $this->getErrorClass();

        if ($errorClass !== '') {
            Html::addCssClass($errorAttributes, $errorClass);
        }

        return Error::create()
            ->attributes($errorAttributes)
            ->encode($this->getEncode())
            ->for($this->inputWidget->getFormModel(), $this->inputWidget->getAttribute())
            ->message($this->getError() ?? '')
            ->messageCallback($this->getErrorMessageCallback())
            ->tag($this->getErrorTag())
            ->render();
    }

    /**
     * @throws ReflectionException
     */
    private function renderInputWidget(): string
    {
        $parts = $this->parts;

        if (!array_key_exists('{input}', $parts)) {
            //$parts['{input}'] = $inputWidget->render();
        }

        if (!array_key_exists('{error}', $parts)) {
            //$parts['{error}'] = $this->getError() !== null ? $this->renderError() : '';
        }

        if (!array_key_exists('{hint}', $parts)) {
            //$parts['{hint}'] = $new->renderHint();
        }

        if (!array_key_exists('{label}', $parts)) {
            $parts['{label}'] = $this->renderLabel();
        }

        //if ($new->getDefaultTokens() !== []) {
        //    $parts = array_merge($new->parts, $this->getDefaultTokens());
        //}

        return preg_replace('/^\h*\v+/m', '', trim(strtr($this->template, $parts)));
    }

    /**
     * @throws ReflectionException
     */
    private function renderHint(): string
    {
        $hintAttributes = $this->getHintAttributes();
        $hintClass = $this->getHintClass();

        if ($hintClass !== '') {
            Html::addCssClass($hintAttributes, $hintClass);
        }

        if ($this->getAriaDescribedBy() === true) {
            $hintAttributes['id'] = $this->inputWidget->getInputId() . '-help';
        }

        return Hint::create()
            ->attributes($hintAttributes)
            ->encode($this->getEncode())
            ->for($this->inputWidget->getFormModel(), $this->inputWidget->getAttribute())
            ->hint($this->getHint())
            ->tag($this->getHintTag())
            ->render();
    }
}
