<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\AST\Node;

class Pair extends AbstractEvaluator
{
    use NodeValueTrait;

    public function __construct(ASTEvaluator $evaluator, Node $car, Node $cdr)
    {
        parent::__construct($evaluator);
        $this->setValue([$car, $cdr]);
    }

    public function doEval(Node ...$nodes): AbstractEvaluator
    {
        [$node] = $nodes;
        [$car, $cdr] = $this->getValue();

        $func = $this->evaluator->eval($node);


        return $func->eval($car)->eval($cdr);
    }
}
