<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\UnaryMathExpression;

class Inc extends UnaryMathExpression
{
    /**
     * @inheritdoc
     */
    public function calculate(int $arg): int
    {
        return $arg + 1;
    }
}
