<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\AST\Node;
use Solution\Evaluate\AbstractEvaluator;
use Solution\Evaluate\ASTEvaluator;
use Solution\Evaluate\NodeValueTrait;

class F extends AbstractEvaluator
{
    const NUMARGS = 2;

    use NodeValueTrait;

    public function __construct(ASTEvaluator $evaluator, Node ...$args)
    {
        parent::__construct($evaluator, ...$args);
        $args || $this->setValue(false);
    }

    public function doEval(Node ...$nodes): AbstractEvaluator
    {
        [$arg1, $arg2] = $nodes;

        return $this->evaluator->eval($arg2);
    }
}
