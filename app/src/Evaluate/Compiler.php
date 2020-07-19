<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\AST\Builder;

class Compiler {

    private string $instructions;
    private ?ExpressionInterface $galaxy = null;

    public function __construct($instructions)
    {
        $this->instructions = $instructions;
    }

    public function compile() {
        $links = new LinkStorage();
        $symbols = new SymbolStorage();
        $context = new Context($symbols, $links);

        foreach (explode("\n", $this->instructions) as $line) {
            [$link, $code] = array_map('trim', explode(' = ', $line));

            $ast = (new Builder($code))->build();
            $expr = new NodeExpression($context, $ast);

            if ($link === 'galaxy') {
                $this->galaxy = $expr;
                continue;
            }
            $link = (int)substr($link, 1);
            $links->addLink($link, $expr);
        }
    }

    public function getGalaxy(): ExpressionInterface
    {
        return $this->galaxy;
    }
}
