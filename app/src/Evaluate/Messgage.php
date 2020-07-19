<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use RuntimeException;

class Message implements ExpressionInterface, ValueInterface {

    use ValueTrait;

    public function __construct(string $contents)
    {
        $this->setValue($contents);
    }

    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
        throw new RuntimeException('Not implemented');
    }

    public function eval(): ExpressionInterface
    {
        return $this;
    }
}