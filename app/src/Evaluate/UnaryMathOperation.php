<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Number;

abstract class UnaryMathOperation implements ExpressionInterface
{
    use AssertsTrait;

    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
        $arg = $arg->eval();
        $this->assertNumber($arg);

        /**
         * @var Number $arg
         */
        $value = $this->calculate($arg->getValue());

        return new Number($value);
    }

    public function eval(): ExpressionInterface
    {
        return $this;
    }

    abstract protected function calculate(int $arg): int;
}
