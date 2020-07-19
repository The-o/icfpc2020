<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\UnaryMathExpression;

class Dec extends UnaryMathExpression
{
    protected function calculate(int $arg): int
    {
        return $arg - 1;
    }
}
