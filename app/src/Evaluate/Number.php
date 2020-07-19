<?php

declare(strict_types=1);

namespace Solution\Evaluate;

class Number extends Operation implements ValueInterface
{
    use ValueTrait;

    public function __construct(int $value)
    {
        $this->setValue($value);
    }

    protected function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;

        $value = $arg->eval();
        $this->assertNumber($value);

        /**
         * @var Number $value
         */
        return new Number($value->getValue() + $this->getValue());
    }
}
