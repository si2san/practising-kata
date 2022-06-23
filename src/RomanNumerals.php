<?php

declare(strict_types=1);

namespace App;

use LogicException;

final class RomanNumerals
{
    private const NUMBER_MIN = 0;

    private const NUMBER_MAX = 4000;

    private const NUMERALS = [
        'M' => 1000,
        'CM' => 900,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    public static function generate(int $number): string
    {
        self::checkIfSupportNumberOrFail($number);

        $result = '';

        foreach (self::NUMERALS as $numeral => $arabic) {
            for (; $number >= $arabic; $number -= $arabic) {
                $result .= $numeral;
            }
        }

        return $result;
    }

    private static function checkIfSupportNumberOrFail(int $number): void
    {
        if ($number <= self::NUMBER_MIN || $number >= self::NUMBER_MAX) {
            throw new LogicException("Unsupport Number");
        }
    }
}
