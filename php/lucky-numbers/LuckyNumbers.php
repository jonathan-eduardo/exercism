<?php

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {
        $firstNumber = implode("", $digitsOfNumber1);
        $secondNumber = implode("", $digitsOfNumber2);

        return (int) $firstNumber + $secondNumber;
    }

    public function isPalindrome(int $number): bool
    {
        $numberAsString = (string) $number;
        return $numberAsString === strrev($numberAsString);
    }

    public function validate(string $input): string
    {
        if ($input === '') {
            return 'Required field';
        }

        return (int) $input > 0 ? '' : 'Must be a whole number larger than 0';
    }
}
