<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use Solution\AST\Node;
use Solution\AST\Number as NumberNode;
use Solution\AST\Symbol as SymbolNode;
use Solution\AST\Link as LinkNode;
use Solution\AST\Tree as TreeNode;

class NodeExpression implements ExpressionInterface
{
    private Context $context;
    private Node $node;

    public function __construct(Context $context, Node $node)
    {
        $this->context = $context;
        $this->node = $node;
    }

    public function applyTo(ExpressionInterface $expr): ExpressionInterface
    {
        return $this->eval()->applyTo($expr);
    }

    public function eval(): ExpressionInterface
    {
        $node = $this->node;
        $node->registerEvaluation();

        switch ($node->getType()) {
            case Node::TYPE_TREE:
                /** @var TreeNode $node */
                $leftExpr = new static($this->context, $node->getLeft());
                $rightExpr = new static($this->context, $node->getRight());
                return $leftExpr->applyTo($rightExpr)->eval();

            case Node::TYPE_NUMBER:
                /** @var NumberNode $node */
                return new Number($node->getValue());

            case Node::TYPE_SYMBOL:
                /** @var SymbolNode $node */
                return $this->context->getSymbol($node->getSymbol());

            case Node::TYPE_LINK:
                /** @var LinkNode $node */
                return $this->context->getLink($node->getLink())->eval();
        }
    }
}
