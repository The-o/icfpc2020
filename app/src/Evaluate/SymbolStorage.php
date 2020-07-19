<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use RuntimeException;
use Solution\Evaluate\Symbol\Add;
use Solution\Evaluate\Symbol\B;
use Solution\Evaluate\Symbol\C;
use Solution\Evaluate\Symbol\Car;
use Solution\Evaluate\Symbol\Cdr;
use Solution\Evaluate\Symbol\Cons;
use Solution\Evaluate\Symbol\Dec;
use Solution\Evaluate\Symbol\F;
use Solution\Evaluate\Symbol\If0;
use Solution\Evaluate\Symbol\Inc;
use Solution\Evaluate\Symbol\Mul;
use Solution\Evaluate\Symbol\Neg;
use Solution\Evaluate\Symbol\T;
use Solution\Evaluate\Symbol\Div;
use Solution\Evaluate\Symbol\Eq;
use Solution\Evaluate\Symbol\I;
use Solution\Evaluate\Symbol\IsNil;
use Solution\Evaluate\Symbol\Lt;
use Solution\Evaluate\Symbol\Nil;
use Solution\Evaluate\Symbol\Pwr2;
use Solution\Evaluate\Symbol\S;

class SymbolStorage
{
    const SYMBOLS = [
        't' => T::class,
        'f' => F::class,
        'if0' => If0::class,
        'cons' => Cons::class,
        'inc' => Inc::class,
        'dec' => Dec::class,
        'neg' => Neg::class,
        'add' => Add::class,
        'mul' => Mul::class,
        'div' => Div::class,
        'eq' => Eq::class,
        'lt' => Lt::class,
        's' => S::class,
        'c' => C::class,
        'b' => B::class,
        'pwr2' => Pwr2::class,
        'i' => I::class,
        'car' => Car::class,
        'cdr' => Cdr::class,
        'nil' => Nil::class,
        'isnil' => IsNil::class,
    ];

    public function getSymbol(string $symbol): ExpressionInterface
    {
        $class = static::SYMBOLS[$symbol] ?? null;

        if (!$class) {
            throw new RuntimeException("Unknown symbol {$symbol}");
        }

        return new $class();
    }
}
