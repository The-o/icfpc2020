<?php

declare(strict_types=1);

namespace Solution;

class Modulator
{
    public function modulate($message): string
    {
        switch (true) {
            case $message === null:
                return '00';

            case is_array($message):
                return $this->modulatePair($message);

            case is_numeric($message):
                return $this->modulateNumber($message);
        }
    }

    private function modulatePair(array $pair): string
    {
        [$car, $cdr] = $pair;

        return "11{$this->modulate($car)}{$this->modulate($cdr)}";
    }

    private function modulateNumber(int $num): string
    {
        if ($num == 0) {
            return '010';
        }

        $sign = $num > 0 ? '01' : '10';
        $num = abs($num);
        $bin = decbin($num);
        $len = strlen($bin);
        $prefixLen = (int)ceil($len / 4);
        $prefix = str_repeat('1', $prefixLen) . '0';
        $zeros = str_repeat('0', $prefixLen * 4 - $len);

        return "{$sign}{$prefix}{$zeros}{$bin}";
    }

    public function demodulate(string $message)
    {
        return $this->demodulateNext($message);
    }


    private function demodulateNext(string &$message)
    {
        $prefix = substr($message, 0, 2);
        $message = substr($message, 2);

        switch ($prefix) {
            case '00':
                return null;

            case '11':
                return $this->demodulatePair($message);

            default:
                return $this->demodulateNumber($prefix, $message);
        }
    }


    private function demodulatePair(string &$message): array
    {
        $car = $this->demodulateNext($message);
        $cdr = $this->demodulateNext($message);
        return [$car, $cdr];
    }

    private function demodulateNumber(string $signMark, string &$message): int
    {
        $sign = $signMark == '01' ? 1 : -1;
        $prefix = strstr($message, '0', true);
        $radix = strlen($prefix);
        $message = substr($message, $radix + 1);
        $binLen = $radix * 4;
        $bin = substr($message, 0, $binLen);
        $message = substr($message, $binLen);

        return $sign * bindec($bin);
    }
}
