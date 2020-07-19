<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;

class Cdr extends Expression
{
    protected function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;
        return $arg->applyTo(new F())->eval();
    }
}
