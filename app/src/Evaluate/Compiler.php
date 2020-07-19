<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Capsule\Di\Container;
use Solution\AST\Builder;

class Compiler
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function compile($instructions): ExpressionInterface
    {
        $links = new LinkStorage();
        $symbols = new SymbolStorage($this->container);
        $context = new Context($symbols, $links);

        foreach (explode("\n", $instructions) as $line) {
            [$link, $code] = array_map('trim', explode('=', $line, 2));

            $ast = (new Builder($code))->build();
            $expr = new NodeExpression($context, $ast);

            if ($link === 'galaxy') {
                $link = ':-42';
            }

            $link = (int)substr($link, 1);

            $links->addLink($link, $expr);
        }

        return $context->getLink(-42);
    }
}
