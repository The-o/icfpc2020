<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Capsule\Di\Container;
use Solution\AST\Builder;

class Compiler
{
    private Container $container;
    private LinkStorage $links;
    private SymbolStorage $symbols;
    private Context $context;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->links = new LinkStorage();
        $this->symbols = new SymbolStorage($this->container);
        $this->context = new Context($this->symbols, $this->links);
    }

    public function compile($code): ExpressionInterface
    {
        $finalExpr = null;
        foreach (explode("\n", $code) as $line) {
            if (strpos($line, '=') !== false) {
                $this->compileLink($line);
                continue;
            }
            $ast = (new Builder($line))->build();
            $finalExpr = new NodeExpression($this->context, $ast);
        }

        return $finalExpr ?? $this->links->getLink(-42);
    }

    private function compileLink($line)
    {
        [$link, $code] = array_map('trim', explode('=', $line, 2));

        $ast = (new Builder($code))->build();
        $expr = new NodeExpression($this->context, $ast);

        if ($link === 'galaxy') {
            $link = ':-42';
        }

        $link = (int)substr($link, 1);

        $this->links->addLink($link, $expr);
    }
}
