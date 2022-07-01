<?php

declare(strict_types=1);

namespace Forge\Form\Field;

use Forge\Form\Exception\AttributeNotSet;
use Forge\Html\Tag\Tag;
use Forge\Model\Contract\FormModelContract;
use Forge\Widget\AbstractWidget;
use InvalidArgumentException;

final class Error extends AbstractWidget
{
    private ?string $message = '';
    private array $messageCallback = [];
    private string $tag = 'div';

    public function __construct(private null|FormModelContract $formModel = null, private string $attribute = '')
    {
        if ($this->formModel?->has($this->attribute) === false) {
            throw new AttributeNotSet();
        }
    }

    /**
     * Returns a new instance with the error text.
     *
     * @param string|null $value The error text.
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
     * Returns a new instance with callback that will be called to obtain an error message.
     *
     * The signature of the callback must be:
     *
     * ```php
     * [$FormModel, function()]
     * ```
     *
     * @param array $value
     *
     * @return static
     */
    public function messageCallback(array $value): self
    {
        $new = clone $this;
        $new->message = (string) call_user_func($value, $this->formModel, $this->attribute);

        return $new;
    }

    /**
     * Returns a new instance with the container tag name for the error.
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
     * Generates a error tag for the given form attribute.
     *
     * @return string the generated error tag.
     */
    protected function run(): string
    {
        $message = $this->message;

        if ($this->tag === '') {
            throw new InvalidArgumentException('Tag name cannot be empty.');
        }

        if ('' === $message && $this->formModel instanceof FormModelContract) {
            $message = $this->formModel->error()->getFirst($this->attribute);
        }

        return match ($message !== null && $message !== '') {
            true => Tag::create($this->tag, $message, $this->attributes),
            default => '',
        };
    }
}
