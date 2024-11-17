<?php

declare(strict_types=1);

class ResistorColorTrio
{
    private const COLOR_TABLE = [
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

    private function getResistorValue(array $bands): int
    {
        [$firstBand, $secondBand, $thirdBand] = $bands;
        $zerosToAdd = str_repeat('0', self::COLOR_TABLE[$thirdBand]);
        $baseValue =  self::COLOR_TABLE[$firstBand] . self::COLOR_TABLE[$secondBand];
        $baseValue .= $zerosToAdd;

        return (int) $baseValue;
    }

    private function translateColorValues(int $resistorValue): string
    {
        $units = [
            1 => 'ohms',
            1000 => 'kiloohms',
            1000000 => 'megaohms',
            1000000000 => 'gigaohms',
        ];

        foreach ($units as $unitBase => $unitLabel) {
            if ($resistorValue < $unitBase * 1000) {
                return ($resistorValue / $unitBase) . " $unitLabel";
            }
        }
    }

    public function label(array $bands): string
    {
        $resistorValue = $this->getResistorValue($bands);
        $translatedValues = $this->translateColorValues($resistorValue);

        return $translatedValues;
    }
}
