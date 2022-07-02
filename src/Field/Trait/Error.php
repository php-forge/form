<?php

declare(strict_types=1);

namespace Forge\Form\Field\Trait;

use Forge\Html\Helper\CssClass;

trait Error
{
    private null|string $error = '';
    private array $errorAttributes = [];
    private string $errorClass = '';
    private array $errorCallback = [];
    private string $errorTag = 'div';

    /**
     * Returns a new instance with the error text.
     *
     * @param string $error The error text.
     *
     * @return self
     */
    public function error(string|null $value): self
    {
        $new = clone $this;
        $new->error = $value;

        return $new;
    }

    /**
     * Returns a new instance with the error attributes.
     *
     * @param array $values Attribute values indexed by attribute names.
     */
    public function errorAttributes(array $values): self
    {
        $new = clone $this;
        $new->errorAttributes = $values;

        return $new;
    }

    /**
     * Returns a new instance with the error class.
     *
     * @param string $value The error class.
     *
     * @return self
     */
    public function errorClass(string $value): self
    {
        $new = clone $this;
        CssClass::add($new->errorAttributes, $value);

        return $new;
    }

    /**
     * Returns a new instance with the error callback.
     *
     * @param array $value The error callback.
     *
     * @return self
     */
    public function errorCallback(array $value): self
    {
        $new = clone $this;
        $new->errorCallback = $value;

        return $new;
    }

    /**
     * Returns a new instance with the error tag.
     *
     * @param string $value The error tag.
     *
     * @return self
     */
    public function errorTag(string $value): self
    {
        $new = clone $this;
        $new->errorTag = $value;

        return $new;
    }
}
