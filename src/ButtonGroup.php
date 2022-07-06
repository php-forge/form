<?php

declare(strict_types=1);

namespace Forge\Form;

use Forge\Html\Helper\CssClass;
use Forge\Html\Tag\Tag;
use Forge\Widget\AbstractWidget;

use function array_merge;
use function implode;
use function is_array;

/**
 * ButtonGroup renders a button group widget.
 *
 * For example,
 *
 * ```php
 * // a button group with items configuration
 * <?= ButtonGroup::create()
 *     ->buttons([
 *         ['label' => 'A'],
 *         ['label' => 'B'],
 *         ['label' => 'C', 'visible' => false],
 *     ]);
 * ?>
 *
 * // button group with an item as a string
 * <?= ButtonGroup::create()
 *     ->buttons([
 *         SubmitButton::create()->content('A')->render(),
 *         ['label' => 'B'],
 *     ]);
 * ?>
 * ```
 *
 * Pressing on the button should be handled via JavaScript. See the following for details:
 */
final class ButtonGroup extends AbstractWidget
{
    private array $buttons = [];
    private bool $container = true;
    private array $containerAttributes = [];
    private string $containerClass = '';
    /** @psalm-var array[] */
    private array $individualButtonAttributes = [];

    /**
     * Returns a new instance specifying List of buttons. Each array element represents a single button which can be
     * specified as a string or an array of  the following structure:
     *
     * - label: string, required, the button label.
     * - attributes: array, optional, the HTML attributes of the button.
     * - type: string, optional, the button type.
     * - visible: bool, optional, whether this button is visible. Defaults to true.
     *
     * @param array $values The buttons' configuration.
     *
     * @return self
     */
    public function buttons(array $values): self
    {
        $new = clone $this;
        $new->buttons = $values;

        return $new;
    }

    /**
     * Returns a new instance specifying enable or disabled container for field.
     *
     * @param bool $value Whether to enable or disable container for widget.
     *
     * @return self
     */
    public function container(bool $value): self
    {
        $new = clone $this;
        $new->container = $value;

        return $new;
    }

    /**
     * Returns a new instance specifying HTML attributes for container.
     *
     * @param array $values Attribute values indexed by attribute names.
     *
     * ```php
     * ['class' => 'test-class']
     * ```
     *
     * @return self
     *
     * @psalm-param array<string, string> $values
     */
    public function containerAttributes(array $values): self
    {
        $new = clone $this;
        $new->containerAttributes = array_merge($new->containerAttributes, $values);

        return $new;
    }

    /**
     * Returns a new instance specifying CSS class for container.
     *
     * @param string $value CSS class for container.
     *
     * @return self
     */
    public function containerClass(string $value): self
    {
        $new = clone $this;
        CssClass::add($new->containerAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance specifying attributes for button.
     *
     * @param array $values The button attributes.
     *
     * @return self
     *
     * @psalm-param array[] $values
     */
    public function individualButtonAttributes(array $values = []): self
    {
        $new = clone $this;
        $new->individualButtonAttributes = $values;

        return $new;
    }

    protected function run(): string
    {
        return match ($this->container) {
            true => Tag::create('div', $this->renderButtons(), $this->containerAttributes),
            false => $this->renderButtons(),
        };
    }

    /**
     * Generates the buttons that compound the group as specified on {@see buttons}.
     *
     * @return string the rendering result.
     */
    private function renderButtons(): string
    {
        $htmlButtons = [];

        /** @psalm-var array<string, array|string> */
        $buttons = $this->buttons;

        foreach ($buttons as $key => $button) {
            if (is_array($button)) {
                /** @var array */
                $attributes = $button['attributes'] ?? [];

                // Set individual button attributes.
                $individualButtonAttributes = $this->individualButtonAttributes[$key] ?? [];
                $attributes = array_merge($attributes, $individualButtonAttributes);

                /** @var string */
                $label = $button['label'] ?? '';

                /** @var string */
                $type = $button['type'] ?? 'button';

                /** @var bool */
                $visible = $button['visible'] ?? true;

                if ($visible === false) {
                    continue;
                }

                $htmlButtons[] = Input\Button::create()->attributes($attributes)->value($label)->type($type)->render();
            } else {
                $htmlButtons[] = $button;
            }
        }

        return implode(PHP_EOL, $htmlButtons);
    }
}
