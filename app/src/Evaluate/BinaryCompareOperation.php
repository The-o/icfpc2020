<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Number;
use Solution\Evaluate\Operation;
use Solution\Evaluate\Symbol\F;
use Solution\Evaluate\Symbol\T;

abstract class BinaryCompareOperation extends Operation
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
        $value = $this->compare($arg1->getValue(), $arg2->getValue());

        return $value ? new T() : new F();
    }

    abstract protected function compare(int $arg1, int $arg2): bool;
}
