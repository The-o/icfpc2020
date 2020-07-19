<?php

declare(strict_types=1);

namespace Solution\Evaluate\Symbol;

use Solution\Evaluate\AssertsTrait;
use Solution\Evaluate\ExpressionInterface;
use Solution\Evaluate\Operation;
use Solution\Evaluate\ValueInterface;
use Solution\Evaluate\ValueTrait;

class T extends Operation implements ValueInterface
{
    const NUMARGS = 2;

    use ValueTrait;

    /**
     * @inheritdoc
     */
    public function __construct(array $args = [])
    {
        parent::__construct($args);
        $args || $this->setValue(true);
    }

    /**
     * @inheritdoc
     */
    public function doApply(array $args): ExpressionInterface
    {
        [$arg1, $arg2] = $args;

        return $arg1;
    }
}
