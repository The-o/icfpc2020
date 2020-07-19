<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;

class Nil implements ExpressionInterface
{
    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
         return new T();
    }

    public function eval(): ExpressionInterface
    {
        return $this;
    }
}
