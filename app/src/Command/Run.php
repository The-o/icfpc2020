<?php

declare(strict_types=1);

namespace Solution\Command;

use Capsule\Di\Definitions;
use Exception;
use Solution\Client;
use Solution\Evaluate\Compiler;
use Solution\Evaluate\Expression;
use Solution\Evaluate\Helper;

class Run
{
    public function eval(string $serverUrl, string $playerKey, $commands)
    {
        $def = new Definitions();
        $def->object(Client::class)
            ->arguments([$serverUrl, $playerKey]);

        $container = $def->newContainer();

        $compiler = new Compiler($container);

        if (substr($commands, 0, 1) == '@') {
            $file = substr($commands, 1);
            $path = getcwd() . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $file);
            $commands = file_get_contents($path);
        } else {
            $commands = "galaxy = ${commands}";
        }

        $expr = $compiler->compile($commands);

        $result = $expr->eval();

        var_dump(Helper::expressionValueToPHP($result));
    }
}
