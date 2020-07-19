<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Operation;

class IsNil extends Operation
{
    /**
     * @inheritDoc
     */
    protected function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;

        return $arg->eval() instanceof Nil ? new T() : new F();
    }
}
