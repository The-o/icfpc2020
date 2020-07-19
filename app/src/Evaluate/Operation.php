<?php

declare(strict_types=1);

namespace Solution\Evaluate;

abstract class Operation implements ExpressionInterface
{
    const NUMARGS = 1;

    use AssertsTrait;

    /**
     * @var ExpressionInterface[]
     */
    private array $args;

    /**
     * @param ExpressionInterface[] $args
     */
    public function __construct(array $args = [])
    {
        $this->args = $args;
    }

    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
        return count($this->args) === static::NUMARGS - 1
            ? $this->doApply([...$this->args, $arg])
            : new static([...$this->args, $arg]);
    }

    /**
     * @param ExpressionInterface[] $args
     */
    abstract protected function doApply(array $args): ExpressionInterface;

    public function eval(): ExpressionInterface
    {
        return $this;
    }

    public function getFreeArgsNum() {
        return static::NUMARGS - count($this->args);
    }
}
