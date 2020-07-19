<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\AssertsTrait;
use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;
use Solution\Evaluate\ValueInterface;
use Solution\Evaluate\ValueTrait;

class F extends Expression implements ValueInterface
{
    const NUMARGS = 2;

    use ValueTrait;

    public function __construct()
    {
        $this->setValue(false);
    }

    /**
     * @inheritDoc
     */
    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
        $this->unsetValue();
        return parent::applyTo($arg);
    }

    /**
     * @inheritdoc
     */
    public function doEval(array $args): ExpressionInterface
    {
        [$arg1, $arg2] = $args;

        return $arg2->eval();
    }
}
