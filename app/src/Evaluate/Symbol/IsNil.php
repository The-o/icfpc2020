<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;

class IsNil implements ExpressionInterface
{
    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
         return $arg->eval() instanceof Nil ? new T() : new F();
    }

    public function eval(): ExpressionInterface
    {
        return $this;
    }
}
