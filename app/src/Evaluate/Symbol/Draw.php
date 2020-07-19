<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Expression;
use Solution\Evaluate\Helper;
use Solution\Evaluate\Picture;

class Draw extends Expression
{
    protected function doEval(array $args): ExpressionInterface
    {
        [$arg] = $args;

        $arg = $arg->eval();

        $points = Helper::expressionValueToPHP($arg);

        return $this->paintPicture($points);
    }

    private function paintPicture(array $points): Picture
    {
        $picture = new Picture();

        while ($points) {
            [$car, $cdr] = $points;
            $points = $cdr;
            [$x, $y] = $car;

            $picture->addPoint($x, $y);
        }

        return $picture;
    }
}
