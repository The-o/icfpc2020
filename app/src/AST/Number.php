<?php

declare(strict_types=1);

namespace Solution\AST;

class Number extends Node
{
    /**
     * @var Number[]
     */
    private static array $numbers = [];

    private int $value;

    private function __construct(int $value)
    {
        parent::__construct(self::TYPE_NUMBER);

        $this->value = $value;
    }

    public static function create(int $value): self
    {
        return static::$numbers[$value] = static::$numbers[$value] ?? new Number($value);
    }

    /**
     * Get the value of value
     */
    public function getValue(): int
    {
        return $this->value;
    }

    public function jsonSerialize()
    {
        return $this->value;
    }
}