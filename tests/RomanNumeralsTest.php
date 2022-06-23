<?php

declare(strict_types=1);

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @dataProvider checks
     */
    public function testCanGenerateTheRomanNumberFor1(int $number, string $numeral): void
    {
        $this->assertEquals($numeral, RomanNumerals::generate($number));
    }

    public function testCannotGenerateARomanNumeralForLessThan1(): void
    {
        $this->expectException(LogicException::class);
        RomanNumerals::generate(0);
    }

    public function testCannotGenerateRomanNumeralForMoreThan4000(): void
    {
        $this->expectException(LogicException::class);
        RomanNumerals::generate(4000);
    }

    public function checks(): array
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100, 'C'],
            [400, 'CD'],
            [900, 'CM'],
            [1000, 'M'],
            [3999, 'MMMCMXCIX']
        ];
    }
}
