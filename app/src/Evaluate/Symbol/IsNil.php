<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;

class IsNil extends Expression
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
