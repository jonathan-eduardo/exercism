<?php

declare(strict_types=1);

class RobotSimulator
{
    private array $directionTableRight = [
        'north' => 'east',
        'east' => 'south',
        'south' => 'west',
        'west' => 'north',
    ];

    private array $directionTableLeft;

    public function __construct(
        private array $position,
        private string $direction
    ) {
        $this->directionTableLeft = array_flip($this->directionTableRight);
    }

    private function handleAdvance(): void
    {
        [$x, $y] = $this->position;

        match($this->direction) {
            'north' => $y++,
            'east' =>  $x++,
            'south' => $y--,
            'west' => $x--,
        };

        $this->position = [$x, $y];
    }

    public function instructions(string $instructions): void
    {
        foreach (str_split($instructions) as $instruction) {
            switch ($instruction) {
                case 'R':
                    $this->direction = $this->directionTableRight[$this->direction];
                    break;
                case 'L':
                    $this->direction = $this->directionTableLeft[$this->direction];
                    break;
                case 'A':
                    $this->handleAdvance();
                    break;
                default:
                    break;
            }
        }
    }

    public function getPosition(): array
    {
        return $this->position;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }
}
