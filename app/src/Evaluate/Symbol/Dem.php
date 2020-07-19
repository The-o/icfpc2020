<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;
use Solution\Evaluate\Helper;
use Solution\Evaluate\Message;
use Solution\Modulator;

class Dem extends Expression
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

        $arg = $arg->eval();

        $this->assertMessage($arg);

        /** @var Message $arg */
        $message = $arg->getValue();
        $value = $this->modulator->demodulate($message);

        return Helper::phpValueToExpression($value);
    }
}
