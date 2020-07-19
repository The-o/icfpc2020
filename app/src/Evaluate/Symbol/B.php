<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;

class B extends Expression
{
    const NUMARGS = 3;

    /**
     * @inheritdoc
     */
    protected function doEval(array $args): ExpressionInterface
    {
        [$f, $g, $x] = $args;

        return $f->applyTo($g->applyTo($x))->eval();
    }
}
