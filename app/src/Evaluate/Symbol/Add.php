<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\AST\Node;
use Solution\Evaluate\AbstractEvaluator;
use Solution\Evaluate\Number;

class Add extends AbstractEvaluator
{
    public function doEval(Node ...$args): AbstractEvaluator
    {
        [$arg] = $args;

        $arg = $this->evaluator->eval($arg);
        $this->assertNumber($arg);

        /** @var Number $arg */
        return new Number($this->evaluator, $arg->getValue());
    }
}
