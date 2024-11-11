<?php

declare(strict_types=1);

class ResistorColorDuo
{
    private const COLORS = [
        'black' => 0,
        'brown' => 1,
        'red' => 2,
        'orange' => 3,
        'yellow' => 4,
        'green' => 5,
        'blue' => 6,
        'violet' => 7,
        'grey' => 8,
        'white' => 9,
    ];

    public function getColorsValue(array $colors): int
    {
        [$bandOne, $bandTwo] = $colors;
        $colorCode = self::COLORS[$bandOne] . self::COLORS[$bandTwo];

        return (int) $colorCode;
    }
}
