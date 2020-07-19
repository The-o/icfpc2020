<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Number;
use Solution\Evaluate\Operation;

abstract class BinaryMathOperation extends Operation
{
    const NUMARGS = 2;

    /**
     * @inheritdoc
     */
    public function doApply(array $args): ExpressionInterface
    {
        [$arg1, $arg2] = $args;

        $arg1 = $arg1->eval();
        $this->assertNumber($arg1, 'first argument');

        $arg2 = $arg2->eval();
        $this->assertNumber($arg2, 'second argument');

        /**
         * @var Number $arg1
         * @var Number $arg2
         */
        $value = $this->calculate($arg1->getValue(), $arg2->getValue());

        return new Number($value);
    }

    abstract protected function calculate(int $arg1, int $arg2): int;
}
