<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;

class Car implements ExpressionInterface
{
    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
        return $arg->eval()->applyTo(new T());
    }

    public function eval(): ExpressionInterface
    {
        return $this;
    }
}