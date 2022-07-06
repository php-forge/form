<?php

declare(strict_types=1);

namespace Forge\Form;

use Forge\Html\Tag\Tag;
use ReflectionException;

/**
 * Renders the field widget along with label and hint tag (if any) according to template.
 */
final class Field extends AbstractField
{
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
        return match ($this->getContainer()) {
            true => Tag::create('div', $this->renderWidget(), $this->getContainerAttributes()),
            false => $this->renderWidget(),
        };
    }
}
