<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use RuntimeException;

class Picture implements ExpressionInterface, ValueInterface
{
    use ValueTrait;


    public function __construct()
    {
        $this->setValue([]);
    }

    public function addPoint(int $x, int $y)
    {
        $points = $this->getValue();
        $points[$x][$y] = true;
        $this->setValue($points);
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
