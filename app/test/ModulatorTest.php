<?php

declare(strict_types=1);

namespace Test;

use PHPUnit\Framework\TestCase;
use Solution\Modulator;

final class ModulatorTest extends TestCase
{

    /**
     * @dataProvider modulationTestDataProvider
     */
    public function testModulate($value, string $expected)
    {
        $modulator = new Modulator();
        $result = $modulator->modulate($value);

        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider modulationTestDataProvider
     */
    public function testDemodulate($expected, string $value)
    {
        $modulator = new Modulator();
        $result = $modulator->demodulate($value);

        $this->assertEquals($expected, $result);
    }

    public function modulationTestDataProvider()
    {
        return [
            '0' => [0, '010'],
            '1' => [1, '01100001'],
            '-1' => [-1, '10100001'],
            '2' => [2, '01100010'],
            '256' => [256, '011110000100000000'],
            'nil' => [null, '00'],
            '[nil, nil]' => [[null, null], '110000'],
            '[0, 256]' => [[0, 256], '11010011110000100000000'],
            '<0, 256, -1>' => [[0, [256, [-1, null]]], '1101011011110000100000000111010000100'],
            '<1, <2 , 3>, 4>' => [[1, [[2, [3, null]], [4, null]]], '1101100001111101100010110110001100110110010000']
        ];
    }

}
