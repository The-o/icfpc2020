<?php

declare(strict_types=1);

namespace Solution;

use Solution\AST\Builder;
use Solution\Evaluate\Compiler;
use Solution\Evaluate\Context;
use Solution\Evaluate\LinkStorage;
use Solution\Evaluate\NodeExpression;
use Solution\Evaluate\Expression;
use Solution\Evaluate\SymbolStorage;
use Solution\Evaluate\ValueInterface;

class Test
{
    public function test()
    {
        $galaxy = file_get_contents(__DIR__ . '\\..\\..\\.ignore\\galaxy.txt');

        $compiler = new Compiler($galaxy);
        $compiler->compile();

        $result = $compiler->getGalaxy()->eval();

        if ($result instanceof ValueInterface && $result->hasValue()) {
            var_dump($result->getValue());
        } elseif ($result instanceof Expression) {
            var_dump($result->getFreeArgsNum());
        } else {
            var_dump($result);
        }
    }
}
