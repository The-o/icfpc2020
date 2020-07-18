<?php

declare(strict_types=1);

namespace Solution;

use Solution\AST\Builder;
use Solution\Evaluate\ASTEvaluator;
use Solution\Evaluate\SymbolStorage;

class Test
{
    private string $code = 'ap ap ap s ap ap c ap eq 0 1 ap ap b ap mul 2 ap ap b pwr2 ap add -1 2';

    public function test()
    {
        $builder = new Builder($this->code);
        $ast = $builder->build();
        $symbols = new SymbolStorage();
        $evaluator = new ASTEvaluator($symbols);

        $result = $evaluator->eval($ast);

        if ($result->hasValue()) {
            var_dump($result->getValue());
        } else {
            var_dump($result);
        }
    }
}
