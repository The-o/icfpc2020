<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use JsonSerializable;

class Pair extends Expression implements ValueInterface, JsonSerializable
{
    use ValueTrait;

    public function __construct($car, $cdr)
    {
        $this->setValue([$car, $cdr]);
    }

    /**
     * @inheritDoc
     */
    protected function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;
        [$car, $cdr] = $this->getValue();

        return $arg->applyTo($car)->applyTo($cdr)->eval();
    }

    public function __clone()
    {
        parent::__clone();
        [$car, $cdr] = $this->getValue();
        $this->setValue([clone $car, clone $cdr]);
    }

    public function jsonSerialize()
    {
        [$car, $cdr] = $this->getValue();
        return [
            $car->eval(),
            $cdr->eval()
        ];
    }
}
