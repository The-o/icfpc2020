<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\BinaryCompareExpression;

class Lt extends BinaryCompareExpression
{

    protected function compare(int $arg1, int $arg2): bool
    {
        return $arg1 < $arg2;
    }
}
