<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;
use Solution\Evaluate\Helper;
use Solution\Evaluate\Message;
use Solution\Modulator;

class Mod extends Expression
{
    private Modulator $modulator;

    public function __construct(Modulator $modulator)
    {
        $this->modulator = $modulator;
    }

    /**
     * @inheritdoc
     */
    public function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;

        $message = Helper::expressionValueToPHP($arg);

        return new Message($this->modulator->modulate($message));
    }
}
