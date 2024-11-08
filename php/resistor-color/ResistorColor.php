<?php

declare(strict_types=1);

function colors(): array
{
    return [
        'black' => 0,
        'brown' => 1,
        'red' => 2,
        'orange' => 3,
        'yellow' => 4,
        'green' => 5,
        'blue' => 6,
        'violet' => 7,
        'grey' => 8,
        'white' => 9
   ];
}

function getAllColors(): array
{
    return array_keys(colors());
}

function colorCode(string $color): int
{
    return colors()[$color];
}
