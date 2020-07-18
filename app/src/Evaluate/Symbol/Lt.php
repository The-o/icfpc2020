<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\AST\Node;
use Solution\Evaluate\AbstractEvaluator;
use Solution\Evaluate\Symbol\Eq\Eq_Arg1;

class Lt extends AbstractEvaluator
{
    const NUMARGS = 2;

    public function doEval(Node ...$args): AbstractEvaluator
    {
        [$arg1, $arg2] = $args;

        $arg1 = $this->evaluator->eval($arg1);
        $this->assertNumber($arg1, 'first argument');

        $arg2 = $this->evaluator->eval($arg2);
        $this->assertNumber($arg2, 'second argument');

        /**
         * @var Number $arg1
         * @var Number $arg2
         */
        return $arg1->getValue() < $arg2->getValue()
            ? new T($this->evaluator)
            : new F($this->evaluator);
    }
}
