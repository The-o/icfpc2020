<?php

declare(strict_types=1);

namespace Solution\AST;

class Symbol extends Node
{
    /**
     * @var Symbol[]
     */
    private static array $symbols = [];

    private string $symbol;

    private function __construct(string $symbol)
    {
        parent::__construct(self::TYPE_SYMBOL);

        $this->symbol = $symbol;
    }

    public static function create(string $symbol): self
    {
        return static::$symbols[$symbol] = static::$symbols[$symbol] ?? new Symbol($symbol);
    }

    /**
     * Get the value of symbol
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function jsonSerialize()
    {
        return $this->symbol;
    }
}