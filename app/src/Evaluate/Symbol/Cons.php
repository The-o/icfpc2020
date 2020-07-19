<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;
use Solution\Evaluate\Pair;

class Cons extends Expression
{
    const NUMARGS = 2;

    /**
     * @inheritdoc
     */
    protected function doEval(array $args): ExpressionInterface
    {
        [$car, $cdr] = $args;

        return new Pair($car, $cdr);
    }
}
