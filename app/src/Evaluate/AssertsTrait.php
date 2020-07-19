<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use RuntimeException;

trait AssertsTrait {
    protected function assertNumber(ExpressionInterface $arg, string $name = 'argument')
    {
        if (!($arg instanceof Number)) {
            $message = sprintf("%s: %s is not a number.\nIt is %s", static::class, $name, print_r($arg, true));
            throw new RuntimeException($message);
        }
    }

    protected function assertPair(ExpressionInterface $arg, string $name = 'argument')
    {
        if (!($arg instanceof Pair)) {
            $message = sprintf("%s: %s is not a pair.\nIt is %s", static::class, $name, print_r($arg, true));
            throw new RuntimeException($message);
        }
    }
}