<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\UnaryMathOperation;

class Dec extends UnaryMathOperation
{
    protected function calculate(int $arg): int
    {
        return $arg - 1;
    }
}
