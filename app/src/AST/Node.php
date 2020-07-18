<?php

declare(strict_types=1);

namespace Solution\AST;

use JsonSerializable;

abstract class Node implements JsonSerializable
{

    const TYPE_TREE = 0;
    const TYPE_NUMBER = 1;
    const TYPE_LINK = 2;
    const TYPE_SYMBOL = 3;

    private int $type;

    protected function __construct(int $type)
    {
        $this->type = $type;
    }

    public function getType(): int
    {
        return $this->type;
    }

    abstract public function jsonSerialize();
}