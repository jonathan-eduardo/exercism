<?php

declare(strict_types=1);

function isValid(string $number): bool
{
    $number = preg_replace("/\s+/", "", $number);
    $includesNonDigit = preg_match("/\D+/", $number);

    if ($includesNonDigit || strlen($number) < 2) {
        return false;
    }

    $checkDigit = (int) substr($number, -1);
    $codeNumbers = str_split(substr($number, 0, -1));
    $sumOfDigits = 0;

    for ($i = count($codeNumbers) - 1; $i >= 0; $i -= 2) {
        $digits = (string) ($codeNumbers[$i] * 2);
        $sumOfDigits += array_sum(str_split($digits));
        $sumOfDigits += (int) $codeNumbers[$i - 1];
    }

    return (10 - ($sumOfDigits % 10)) % 10 === $checkDigit;
}
