<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\AST\Node;
use Solution\Evaluate\AbstractEvaluator;
use Solution\Evaluate\Symbol\If0\If0_Flag;

class If0 extends AbstractEvaluator
{
    const NUMARGS = 3;

    public function doEval(Node ...$args): AbstractEvaluator
    {
        [$flag, $case0, $case1] = $args;

        $flag = $this->evaluator->eval($flag);
        $this->assertNumber($flag, 'flag');

        /** @var Number $flag */
        return $this->evaluator->eval($flag->getValue() === 0 ? $case0 : $case1);
    }
}
