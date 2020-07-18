<?php

declare(strict_types=1);

namespace Solution\AST;

class Tree extends Node
{
    private Node $left;
    private Node $right;

    private function __construct(Node $left, Node $right)
    {
        parent::__construct(static::TYPE_TREE);

        $this->left = $left;
        $this->right = $right;
    }


    public static function create(Node $left, Node $right): self
    {
        return new static($left, $right);
    }

    public function jsonSerialize()
    {
        return ['ap' => [$this->left, $this->right]];
    }

    /**
     * Get the value of left
     */
    public function getLeft(): Node
    {
        return $this->left;
    }

    /**
     * Get the value of right
     */
    public function getRight(): Node
    {
        return $this->right;
    }
}
