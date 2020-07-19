<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\Evaluate\ExpressionInterface;

class Context
{
    private SymbolStorage $symbols;
    private LinkStorage $links;

    public function __construct(SymbolStorage $symbols, LinkStorage $links)
    {
        $this->symbols = $symbols;
        $this->links = $links;
    }

    public function getLink(int $name): ExpressionInterface
    {
        return $this->links->getLink($name);
    }

    public function getSymbol(string $name): ExpressionInterface
    {
        return $this->symbols->getSymbol($name);
    }
}
