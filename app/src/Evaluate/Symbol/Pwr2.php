<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\UnaryMathOperation;

class Pwr2 extends UnaryMathOperation
{
    protected function calculate(int $arg): int
    {
        return (int)(2 ** $arg);
    }
}
