<?php

declare(strict_types=1);

use Lijinma\Commander;
use Solution\Client;
use Solution\Command\Modulator;
use Solution\Command\Run;
use Solution\Command\Test;

require __DIR__ . '/vendor/autoload.php';

$cmd = new Commander();

$runCmd = new Run();

$cmd->version('0.0.1')
    ->command('eval <server-url> <player-key> <commands>')
    ->action([$runCmd, 'eval']);

$cmd->command('mod <value>')
    ->action(function ($value) {
        (new Modulator())->modulate($value);
    });

$cmd->command('dem <message>')
    ->action(function ($message) {
        (new Modulator())->demodulate($message);
    });

$cmd->parse($argv);
