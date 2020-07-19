<?php

declare(strict_types=1);

namespace Solution\Command;

use Solution\Modulator as SolutionModulator;

use function GuzzleHttp\json_decode;

class Modulator
{
    public function modulate($value)
    {
        $modulator = new SolutionModulator();
        $value = eval("return $value;");

        print($modulator->modulate($value));
        print("\n");
    }

    public function demodulate($message)
    {
        $modulator = new SolutionModulator();

        print_r($modulator->demodulate($message));
        print("\n");
    }

}
