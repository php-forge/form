<?php

declare(strict_types=1);

namespace Forge\Form\Base;

use Forge\Model\Contract\FormModelContract;

interface FormWidgetInterface
{
    public function charset(string $value): static;

    public function getAttribute(): string;

    public function getAttributesValue(string $value): mixed;

    public function getCharset(): string;

    public function getFormModel(): FormModelContract;

    public function getInputId(): string;
}
