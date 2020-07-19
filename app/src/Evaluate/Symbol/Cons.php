<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Operation;
use Solution\Evaluate\Pair;

class Cons extends Operation
{
    const NUMARGS = 2;

    /**
     * @inheritdoc
     */
    protected function doApply(array $args): ExpressionInterface
    {
        [$car, $cdr] = $args;

        return new Pair($car, $cdr);
    }
}
