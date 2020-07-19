<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Number;

abstract class UnaryMathOperation extends Operation
{
    /**
     * @inheritdoc
     */
    public function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;

        $arg = $arg->eval();
        $this->assertNumber($arg);

        /**
         * @var Number $arg
         */
        $value = $this->calculate($arg->getValue());

        return new Number($value);
    }

    abstract protected function calculate(int $arg): int;
}
