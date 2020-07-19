<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\UnaryMathExpression;

class Neg extends UnaryMathExpression
{
    protected function calculate(int $arg): int
    {
        return -$arg;
    }
}
