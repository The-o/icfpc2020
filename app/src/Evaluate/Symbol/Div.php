<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\BinaryMathExpression;

class Div extends BinaryMathExpression
{
    protected function calculate(int $arg1, int $arg2): int
    {
        return (int) ($arg1 / $arg2);
    }
}
