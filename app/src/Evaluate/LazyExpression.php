<?php

declare(strict_types=1);

namespace Solution\Evaluate;

class LazyExpression implements ExpressionInterface {

    private ?ExpressionInterface $result = null;
    private ?ExpressionInterface $expr;

    public function __construct(ExpressionInterface $expr)
    {
        $this->expr = $expr;
    }

    public function eval(): ExpressionInterface
    {
        if (!$this->result) {
            $this->result = $this->expr->eval();
            $this->expr = null;
        }
        return $this->result;
    }

    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
        return $this->eval()->applyTo($arg);
    }
}