<?php

declare(strict_types=1);

namespace Solution;

use Solution\AST\Builder;
use Solution\Evaluate\Context;
use Solution\Evaluate\LinkStorage;
use Solution\Evaluate\NodeExpression;
use Solution\Evaluate\Number;
use Solution\Evaluate\Operation;
use Solution\Evaluate\Pair;
use Solution\Evaluate\Symbol\Nil;
use Solution\Evaluate\Symbol\T;
use Solution\Evaluate\SymbolStorage;
use Solution\Evaluate\ValueInterface;

class Test
{
    public function test()
    {
        $galaxy = file_get_contents(__DIR__ . '\\..\\..\\.ignore\\galaxy.txt');

        $links = new LinkStorage();
        $symbols = new SymbolStorage();
        $context = new Context($symbols, $links);

        $galaxyAst = null;
        foreach (explode("\n", $galaxy) as $line) {
            [$link, $code] = array_map('trim', explode(' = ', $line));

            $builder = new Builder($code);
            $ast = $builder->build();
            $expr = new NodeExpression($context, $ast);

            if ($link === 'galaxy') {
                $galaxyExpr = $expr;
                continue;
            }
            $link = (int)substr($link, 1);
            $links->addLink($link, $expr);
        }

        $result = $galaxyExpr->eval();

        if ($result instanceof ValueInterface && $result->hasValue()) {
            var_dump($result->getValue());
        } elseif ($result instanceof Operation) {
            var_dump($result->getFreeArgsNum());
        } else {
            var_dump($result);
        }
    }
}
