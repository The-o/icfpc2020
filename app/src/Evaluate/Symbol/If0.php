<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Number;
use Solution\Evaluate\Expression;

class If0 extends Expression
{
    const NUMARGS = 3;

    /**
     * @inheritdoc
     */
    public function doEval(array $args): ExpressionInterface
    {
        [$flag, $case0, $case1] = $args;

        $flag = $flag->eval();
        $this->assertNumber($flag, 'flag');

        /** @var Number $flag */
        return ($flag->getValue() === 0 ? $case0 : $case1)->eval();
    }
}
