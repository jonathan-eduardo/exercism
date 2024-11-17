<?php

declare(strict_types=1);

class Robot
{
    private ?string $name = null;
    private static array $usedNames = [];

    public function __construct()
    {
        $robotName = $this->generateName();

        $this->name = $robotName;
        self::$usedNames[$robotName] = true;
    }


    private function generateName(): string|callable
    {
        $alphabet = range('A', 'Z');
        $firstLetter = $alphabet[rand(0, 25)];
        $secondLetter = $alphabet[rand(0, 25)];
        $firstDigit = rand(0, 9);
        $secondDigit = rand(0, 9);
        $thirdDigit = rand(0, 9);

        $robotName = $firstLetter . $secondLetter . $firstDigit . $secondDigit . $thirdDigit;

        while (isset(self::$usedNames[$robotName])) {
            return $this->generateName();
        }

        return $robotName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function reset(): void
    {
        $newName = $this->generateName();
        $this->name = $newName;
        self::$usedNames[$newName] = true;
    }
}
