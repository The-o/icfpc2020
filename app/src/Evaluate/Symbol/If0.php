<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\AssertsTrait;
use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Number;
use Solution\Evaluate\Operation;

class If0 extends Operation
{
    const NUMARGS = 3;

    use AssertsTrait;

    /**
     * @inheritdoc
     */
    public function doApply(array $args): ExpressionInterface
    {
        [$flag, $case0, $case1] = $args;

        $flag = $flag->eval();
        $this->assertNumber($flag, 'flag');

        /** @var Number $flag */
        return $flag->getValue() === 0 ? $case0 : $case1;
    }
}
