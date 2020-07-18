<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\AST\Node;

class Number extends AbstractEvaluator
{
    use NodeValueTrait;

    public function __construct(ASTEvaluator $evaluator, int $value)
    {
        parent::__construct($evaluator);
        $this->setValue($value);
    }

    public function doEval(Node ...$args): AbstractEvaluator
    {
        [$arg] = $args;

        $arg = $this->evaluator->eval($arg);
        $this->assertNumber($arg);

        /**
         * @var Number $arg
         */
        return new Number($this->evaluator, $arg->getValue() + $this->getValue());
    }
}
