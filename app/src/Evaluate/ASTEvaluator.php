<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\AST\Node;
use Solution\AST\Number as NumberNode;
use Solution\AST\Symbol as SymbolNode;
use Solution\AST\Link as LinkNode;
use Solution\AST\Tree as TreeNode;

class ASTEvaluator
{
    private SymbolStorage $symbols;

    public function __construct(SymbolStorage $symbols)
    {
        $this->symbols = $symbols;
    }

    public function eval(Node $node): AbstractEvaluator
    {
        $node->registerEvaluation();

        switch ($node->getType()) {
            case Node::TYPE_TREE:
                /** @var TreeNode $node */
                return $this
                    ->eval($node->getLeft())
                    ->eval($node->getRight());

            case Node::TYPE_NUMBER:
                /** @var NumberNode $node */
                return new Number($this, $node->getValue());

            case Node::TYPE_SYMBOL:
                /** @var SymbolNode $node */
                return $this->symbols->getEvaluator($this, $node->getSymbol());

            case Node::TYPE_LINK:
                /** @var LinkNode $node */
                return $this->links->getEvaluator($this, $node->getLink());
        }
    }
}
