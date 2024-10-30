<?php

class Lasagna
{

    private const EXPECTED_COOK_TIME = 40;
    private const LAYER_MINUTES_TO_PREP = 2;
    
    public function expectedCookTime(): int
    {
        return self::EXPECTED_COOK_TIME;
    }

    public function remainingCookTime(int $elapsed_minutes): int
    {
        return self::EXPECTED_COOK_TIME - $elapsed_minutes;
    }

    public function totalPreparationTime(int $layers_to_prep): int
    {
        return self::LAYER_MINUTES_TO_PREP * $layers_to_prep;
    }

    public function totalElapsedTime(int $layers_to_prep, int $elapsed_minutes): int
    {
        return $this->totalPreparationTime($layers_to_prep) + $elapsed_minutes;
    }

    public function alarm(): string
    {
        return "Ding!";
    }
}
