<?php

declare(strict_types=1);

ini_set('memory_limit', '3G');

use Lijinma\Commander;
use Solution\Command\Modulator;
use Solution\Command\Run;

require __DIR__ . '/vendor/autoload.php';

$cmd = new Commander();

$runCmd = new Run();

$cmd->version('0.0.1')
    ->command('eval <server-url> <player-key> <commands...>')
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
