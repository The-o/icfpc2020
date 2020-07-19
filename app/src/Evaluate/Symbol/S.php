<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\AST\Node;
use Solution\AST\Tree;
use Solution\Evaluate\AbstractOperation;
use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\LazyExpression;
use Solution\Evaluate\Operation;

class S extends Operation
{
    const NUMARGS = 3;

    /**
     * @inheritdoc
     */
    protected function doApply(array $args): ExpressionInterface
    {
        [$f, $g, $x] = $args;

        $x = new LazyExpression($x);

        return $f->eval()->applyTo($x)
            ->applyTo($g->applyTo($x));
    }
}
