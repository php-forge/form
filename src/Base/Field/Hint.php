<?php

declare(strict_types=1);

namespace Forge\Form\Base\Field;

use Forge\Form\Exception\AttributeNotSet;
use Forge\Html\Tag\Tag;
use Forge\Model\Contract\FormModelContract;
use Forge\Widget\AbstractWidget;
use InvalidArgumentException;

final class Hint extends AbstractWidget
{
    private ?string $message = '';
    private string $tag = 'div';

    public function __construct(private null|FormModelContract $formModel = null, private string $attribute = '')
    {
        if ($this->formModel?->has($this->attribute) === false) {
            throw new AttributeNotSet();
        }
    }

    /**
     * Returns a new instance with the hint text.
     *
     * @param string|null $value The hint text.
     *
     * @return self
     */
    public function message(string|null $value): self
    {
        $new = clone $this;
        $new->message = $value;

        return $new;
    }

    /**
     * Returns a new instance with the container tag name for the hint.
     *
     * @param string $value The container tag name.
     *
     * @return self
     */
    public function tag(string $value): self
    {
        $new = clone $this;
        $new->tag = $value;

        return $new;
    }

    /**
     * Generates a hint tag for the given form attribute.
     *
     * @return string the generated hint tag.
     */
    protected function run(): string
    {
        $message = $this->message;

        if ($this->tag === '') {
            throw new InvalidArgumentException('Tag name cannot be empty.');
        }

        if ($this->formModel instanceof FormModelContract && $message === '') {
            $message = $this->formModel->getHint($this->attribute);
        }

        return match ($message !== null && $message !== '') {
            true => Tag::create($this->tag, $message, $this->attributes),
            default => '',
        };
    }
}
