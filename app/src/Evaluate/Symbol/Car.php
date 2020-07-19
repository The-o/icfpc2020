<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Operation;

class Car extends Operation
{
    protected function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;
        return $arg->applyTo(new T())->eval();
    }
}
