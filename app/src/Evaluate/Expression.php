<?php

declare(strict_types=1);

namespace Solution\Evaluate;

use RuntimeException;

abstract class Expression implements ExpressionInterface
{
    const NUMARGS = 1;

    use AssertsTrait;

    /**
     * @var ExpressionInterface[]
     */
    private array $args = [];

    private ?ExpressionInterface $result = null;

    public function applyTo(ExpressionInterface $arg): ExpressionInterface
    {
        if (count($this->args) === static::NUMARGS) {
            return $this->eval()->applyTo($arg);
        }
        $this->args[] = $arg;
        return $this;
    }

    public function eval(): ExpressionInterface
    {
        switch (true) {
            case $this->result !== null:
                return $this->result;

            case count($this->args) < static::NUMARGS:
                return $this;


            case count($this->args) > static::NUMARGS:
                throw new RuntimeException('Something went wrong');

            default:
                $this->result = $this->doEval($this->args);
                $this->args = [];
                return $this->result;
        }
    }

    /**
     * @param ExpressionInterface[] $args
     *
     * @return ExpressionInterface
     */
    abstract protected function doEval(array $args): ExpressionInterface;

    public function getFreeArgsNum()
    {
        return static::NUMARGS - count($this->args);
    }

    public function __clone()
    {
        $this->args = array_map(function ($arg) {
            return clone $arg;
        }, $this->args);
    }
}
