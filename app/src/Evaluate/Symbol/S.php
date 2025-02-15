<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;

class S extends Expression
{
    const NUMARGS = 3;

    /**
     * @inheritdoc
     */
    protected function doEval(array $args): ExpressionInterface
    {
        [$f, $g, $x] = $args;

        return $f->applyTo($x)
            ->applyTo($g->applyTo($x))->eval();
    }
}
