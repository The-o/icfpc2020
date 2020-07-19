<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;

class Nil extends Expression
{
    /**
     * @inheritDoc
     */
    protected function doEval(array $args): ExpressionInterface
    {
        return new T();
    }
}
