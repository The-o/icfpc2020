<?php

declare(strict_types=1);

namespace Solution\Command;

use Capsule\Di\Definitions;
use Solution\Client;
use Solution\Evaluate\Compiler;
use Solution\Evaluate\Helper;

class Run
{
    public function eval(string $serverUrl, string $playerKey, $sources)
    {
        $def = new Definitions();
        $def->object(Client::class)
            ->arguments([$serverUrl, $playerKey]);

        $container = $def->newContainer();

        $compiler = new Compiler($container);

        foreach ($sources as $source) {
            if (substr($source, 0, 1) == '@') {
                $file = substr($source, 1);
                $path = getcwd() . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $file);
                $source = file_get_contents($path);
            }
            $expr = $compiler->compile($source);
        }

        $result = $expr->eval();

        var_dump(Helper::expressionValueToPHP($result));
    }
}
