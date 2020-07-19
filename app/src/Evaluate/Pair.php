<?php

declare(strict_types=1);

namespace Solution\Evaluate;

class Pair implements ExpressionInterface
{
    use ValueTrait;

    public function __construct($car, $cdr)
    {
        $this->setValue([$car, $cdr]);
    }

    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
        [$car, $cdr] = $this->getValue();
        return new Ap(
            new Ap ($arg, $car),
            $cdr
        );
    }

    public function eval(): ExpressionInterface
    {
        return $this;
    }
}
