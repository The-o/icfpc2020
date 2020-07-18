<?php

use Lijinma\Commander;
use Solution\Client;

require __DIR__ . '/vendor/autoload.php';

$cmd = new Commander();

$cmd->version('0.0.1')
    ->command('run <server-url> <player-key>')
    ->action(function ($serverUrl, $playerKey) {
        $client = new Client($serverUrl);
        $client->sendRequest($playerKey);
    });

$cmd->parse($argv);