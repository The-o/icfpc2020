<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use RuntimeException;
use Solution\Evaluate\Symbol\Nil;

trait AssertsTrait
{
    protected function assertNumber(ExpressionInterface $arg, string $name = 'argument')
    {
        if ($arg instanceof Number) {
            return;
        }
        $message = sprintf("%s: %s is not a number.\nIt is %s", static::class, $name, print_r($arg, true));
        throw new RuntimeException($message);
    }

    protected function assertPair(ExpressionInterface $arg, string $name = 'argument')
    {
        if ($arg instanceof Pair) {
            return;
        }
        $message = sprintf("%s: %s is not a pair.\nIt is %s", static::class, $name, print_r($arg, true));
        throw new RuntimeException($message);
    }

    protected function assertMessage(ExpressionInterface $arg, string $name = 'argument')
    {
        if ($arg instanceof Pair || $arg instanceof Number || $arg instanceof Nil) {
            return;
        }
        $message = sprintf("%s: %s is not a message.\nIt is %s", static::class, $name, print_r($arg, true));
        throw new RuntimeException($message);
    }
}
