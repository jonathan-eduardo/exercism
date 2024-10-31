<?php

class PizzaPi
{
    private const MINIMUM_DOUGH = 200;
    private const EXTRA_DOUGH = 20;
    private const SAUCE_PER_PIZZA = 125;
    private const PIZZA_SLICES = 8;

    public function calculateDoughRequirement(int $pizzas, int $persons): int
    {
        return $pizzas * (($persons * self::EXTRA_DOUGH) + self::MINIMUM_DOUGH);
    }

    public function calculateSauceRequirement(int $pizzas, int $sauceCan): int
    {
        return $pizzas * self::SAUCE_PER_PIZZA / $sauceCan;
    }

    public function calculateCheeseCubeCoverage(
        int $cheeseDimension,
        float $cheeseThickness,
        int $pizzaDiameter,
    ): int {
        return (int) (($cheeseDimension ** 3) / ($cheeseThickness * M_PI * $pizzaDiameter));
    }

    public function calculateLeftOverSlices(int $pizzas, int $friends): int
    {
        return ($pizzas * self::PIZZA_SLICES) % $friends;
    }
}
