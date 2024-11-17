<?php

declare(strict_types=1);

function squareOfSum(int $max): int
{
    $sum = 0;

    for ($i = 1; $i <= $max; $i++) {
        $sum += $i;
    }

    return $sum ** 2;
}

function sumOfSquares(int $max): int
{
    $sum = 0;

    for ($i = 1; $i <= $max; $i++) {
        $sum += $i ** 2;
    }

    return $sum;
}

function difference(int $max): int
{
    return squareOfSum($max) - sumOfSquares($max);
}

// This could be easily solved without having to loop to the last number using the math formulas:

// squareOfSum = ((n * (n + 1)) / 2) ** 2
// sumOfSquares = (n * (n + 1) * (2n + 1)) / 6
