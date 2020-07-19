<?php

declare(strict_types=1);

namespace Solution\Evaluate;

class Ap implements ExpressionInterface
{

    private ExpressionInterface $func;
    private ExpressionInterface $arg;
    public function __construct(ExpressionInterface $func, ExpressionInterface $arg)
    {
        $this->func = $func;
        $this->arg = $arg;
    }

    public function applyTo(ExpressionInterface $arg): ExpressionInterface {
        return new static($this, $arg);
    }

    public function eval(): ExpressionInterface
    {
        return $this->func->eval()->applyTo($this->arg)->eval();
    }

}