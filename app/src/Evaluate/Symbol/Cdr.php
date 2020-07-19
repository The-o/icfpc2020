<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Operation;

class Cdr extends Operation
{
    protected function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;
        return $arg->applyTo(new F())->eval();
    }
}
