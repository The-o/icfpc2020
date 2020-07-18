<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use RuntimeException;
use Solution\AST\Node;

abstract class AbstractEvaluator
{
    const NUMARGS = 1;

    protected ASTEvaluator $evaluator;

    /**
     * @var Node[]
     */
    private array $args;

    public function __construct(ASTEvaluator $evaluator, Node ...$args)
    {
        $this->evaluator = $evaluator;
        $this->args = $args;
    }

    public function eval(Node $node): AbstractEvaluator
    {
        return count($this->args) === static::NUMARGS - 1
            ? $this->doEval(...[...$this->args, $node])
            : new static($this->evaluator, ...[...$this->args, $node]);
    }

    abstract protected function doEval(Node ...$args): AbstractEvaluator;

    public function hasValue(): bool
    {
        return false;
    }

    public function getValue()
    {
        throw new RuntimeException('Noi implemented');
    }

    protected function assertNumber(AbstractEvaluator $arg, string $name = 'argument')
    {
        if (!($arg instanceof Number)) {
            $message = sprintf("%s: %s is not a number.\nIt is %s", static::class, $name, print_r($arg, true));
            throw new RuntimeException($message);
        }
    }
}
