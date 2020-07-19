<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Client;
use Solution\Evaluate\Expression;
use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Helper;
use Solution\Evaluate\ValueInterface;
use Solution\Evaluate\ValueTrait;
use Solution\Modulator;

class Send extends Expression implements ValueInterface
{
    use ValueTrait;

    private Client $client;
    private Modulator $modulator;

    public function __construct(Client $client, Modulator $modulator)
    {
        $this->client = $client;
        $this->modulator = $modulator;
    }

    protected function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;
        $arg = $arg->eval();

        $message = Helper::expressionValueToPHP($arg);

        $message = $this->modulator->modulate($message);
        $answer = $this->client->send($message);
        var_dump($answer);
        $answer = $this->modulator->demodulate($answer);

        return Helper::phpValueToExpression($answer);
    }
}
