<?php

declare(strict_types=1);

namespace Solution\Evaluate;

trait ValueTrait
{
    private $value = null;
    private bool $hasValue = false;

    private function setValue($value)
    {
        $this->value = $value;
        $this->hasValue = true;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function hasValue(): bool
    {
        return $this->hasValue;
    }
}
