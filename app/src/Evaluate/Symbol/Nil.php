<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Operation;

class Nil extends Operation
{
    /**
     * @inheritDoc
     */
    protected function doEval(array $args): ExpressionInterface
    {
        return new T();
    }
}
