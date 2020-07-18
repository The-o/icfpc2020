<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\AST\Node;
use Solution\AST\Tree;
use Solution\Evaluate\Evaluator;
use Solution\Evaluate\AbstractEvaluator;

class C extends AbstractEvaluator
{
    const NUMARGS = 3;

    public function doEval(Node ...$args): AbstractEvaluator
    {
        [$f, $x, $y] = $args;
        return $this->evaluator->eval($f)
            ->eval($y)
            ->eval($x);
    }
}
