<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\BinaryMathExpression;

class Mul extends BinaryMathExpression
{
    protected function calculate(int $arg1, int $arg2): int
    {
        return $arg1 * $arg2;
    }
}
