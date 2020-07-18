<?php

declare(strict_types=1);

namespace Solution\AST;

class Link extends Node
{
    /**
     * @var Link[]
     */
    private static array $links = [];

    private int $link;

    private function __construct(int $link)
    {
        parent::__construct(self::TYPE_LINK);

        $this->link = $link;
    }

    public static function create(int $link): self
    {
        return static::$links[$link] = static::$links[$link] ?? new Link($link);
    }

    /**
     * Get the value of value
     */
    public function getLink(): int
    {
        return $this->link;
    }

    /* public function registerEvaluation()
        {
        }
    */

    public function jsonSerialize()
    {
        return ":{$this->link}";
    }
}
