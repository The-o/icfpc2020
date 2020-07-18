<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\AST\Node;
use Solution\Evaluate\AbstractEvaluator;
use Solution\Evaluate\Pair;

class Cons extends AbstractEvaluator
{
    const NUMARGS = 2;

    public function doEval(Node ...$args): AbstractEvaluator
    {
        [$car, $cdr] = $args;

        return new Pair($this->evaluator, $car, $cdr);
    }
}
