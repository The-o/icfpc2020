<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;

class C extends Expression
{
    const NUMARGS = 3;

    /**
     * @inheritdoc
     */
    protected function doEval(array $args): ExpressionInterface
    {
        [$f, $x, $y] = $args;

        return $f->applyTo($y)->applyTo($x)->eval();
    }
}
