<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\AST\Node;
use Solution\AST\Tree;
use Solution\Evaluate\AbstractEvaluator;

class B extends AbstractEvaluator
{
    const NUMARGS = 3;

    protected function doEval(Node ...$args): AbstractEvaluator
    {
        [$f, $g, $x] = $args;

        return $this->evaluator->eval($f)
            ->eval(Tree::create($g, $x)); //small hack
    }
}
