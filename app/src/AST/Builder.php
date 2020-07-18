<?php

declare(strict_types=1);

namespace Solution\AST;

class Builder
{
    private string $code;
    public function __construct(string $code)
    {
        $this->code = $code;
    }

    public function build(): Node
    {
        $tokens = explode(' ', $this->code);

        return $this->buildFromTokens($tokens);
    }

    private function buildFromTokens(&$tokens): Node
    {
        $token = array_shift($tokens);

        switch (true) {
            case $token === 'ap':
                $left = $this->buildFromTokens($tokens);
                $right = $this->buildFromTokens($tokens);

                return Tree::create($left, $right);

            case substr($token, 0, 1) === ':':
                return Link::create((int)substr($token, 1));

            case is_numeric($token):
                return Number::create((int)$token);

            default:
                return Symbol::create($token);
        }
    }
}
