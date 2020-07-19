<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Operation;

class C extends Operation
{
    const NUMARGS = 3;

    /**
     * @inheritdoc
     */
    protected function doApply(array $args): ExpressionInterface
    {
        [$f, $x, $y] = $args;

        return $f->eval()->applyTo($y)->applyTo($x);
    }
}
