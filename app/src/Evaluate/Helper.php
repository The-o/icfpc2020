<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use RuntimeException;
use Solution\Evaluate\Symbol\Nil;

class Helper
{
    public static function expressionValueToPHP(ExpressionInterface $expr)
    {
        $expr = $expr->eval();

        switch (true) {
            case $expr instanceof Number:
                /** @var Number $expr */
                return $expr->getValue();

            case $expr instanceof Nil:
                return null;

            case $expr instanceof Pair:
                /** @var Pair $expr */
                [$car, $cdr] = $expr->getValue();
                return [
                    self::expressionValueToPHP($car),
                    self::expressionValueToPHP($cdr)
                ];

            default:
                throw new RuntimeException('expressionValueToPHP: Unsupported expression type');
        }
    }

    public static function phpValueToExpression($value): ExpressionInterface
    {
        switch (true) {
            case $value === null:
                return new Nil();

            case is_numeric($value):
                return new Number($value);

            case is_array($value) && count($value) == 2:
                [$car, $cdr] = $value;
                $car = self::phpValueToExpression($car);
                $cdr = self::phpValueToExpression($cdr);
                return new Pair($car, $cdr);

            default:
                throw new RuntimeException('phpValueToExpression: Unsupported value');
        }
    }
}
