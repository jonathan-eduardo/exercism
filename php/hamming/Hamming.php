<?php

declare(strict_types=1);

function distance(string $strandA, string $strandB): int
{
    $strandALength = strlen($strandA);
    $strandBLength = strlen($strandB);
    $distance = 0;

    if ($strandALength !== $strandBLength) {
        throw new InvalidArgumentException('strands must be of equal length');
    }

    for ($i = 0; $i < $strandALength; $i++) {
        if ($strandA[$i] !== $strandB[$i]) {
            $distance++;
        }
    }

    return $distance;
}
