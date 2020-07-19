<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\BinaryMathOperation;

class Mul extends BinaryMathOperation
{
    protected function calculate(int $arg1, int $arg2): int
    {
        return $arg1 * $arg2;
    }
}
