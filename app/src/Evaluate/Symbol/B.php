<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Operation;

class B extends Operation
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
