<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\UnaryMathExpression;

class Pwr2 extends UnaryMathExpression
{
    protected function calculate(int $arg): int
    {
        return (int)(2 ** $arg);
    }
}
