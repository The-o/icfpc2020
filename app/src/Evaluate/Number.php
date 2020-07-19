<?php

declare(strict_types=1);

namespace Solution\Evaluate;

class Number implements ExpressionInterface, ValueInterface
{
    use AssertsTrait;
    use ValueTrait;

    public function __construct(int $value)
    {
        $this->setValue($value);
    }

    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
        $value = $arg->eval();
        $this->assertNumber($value);

        /**
         * @var Number $value
         */
        return new Number($value->getValue() + $this->getValue());
    }

    public function eval(): ExpressionInterface
    {
        return $this;
    }
}
