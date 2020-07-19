<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\UnaryMathOperation;

class Neg extends UnaryMathOperation
{
    protected function calculate(int $arg): int
    {
        return -$arg;
    }
}
