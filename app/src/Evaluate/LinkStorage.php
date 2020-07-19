<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use RuntimeException;
use Solution\AST\Node;
use Solution\Evaluate\Symbol\Add;
use Solution\Evaluate\Symbol\B;
use Solution\Evaluate\Symbol\C;
use Solution\Evaluate\Symbol\Car;
use Solution\Evaluate\Symbol\Cdr;
use Solution\Evaluate\Symbol\Cons;
use Solution\Evaluate\Symbol\Dec;
use Solution\Evaluate\Symbol\F;
use Solution\Evaluate\Symbol\If0;
use Solution\Evaluate\Symbol\Inc;
use Solution\Evaluate\Symbol\Mul;
use Solution\Evaluate\Symbol\Neg;
use Solution\Evaluate\Symbol\T;
use Solution\Evaluate\Symbol\Div;
use Solution\Evaluate\Symbol\Eq;
use Solution\Evaluate\Symbol\I;
use Solution\Evaluate\Symbol\IsNil;
use Solution\Evaluate\Symbol\Lt;
use Solution\Evaluate\Symbol\Nil;
use Solution\Evaluate\Symbol\Pwr2;
use Solution\Evaluate\Symbol\S;

class LinkStorage
{

    /**
     * @var Node[]
     */
    private array $links = [];

    public function addLink(int $link, Node $node) {
        $this->links[$link] = $node;
    }

    public function getLink(Context $context, int $link): ExpressionInterface
    {
        $node = $this->links[$link] ?? null;

        if (!$node) {
            throw new RuntimeException("Unknown link :{$link}");
        }

        return new NodeExpression($context, $node);
    }
}
