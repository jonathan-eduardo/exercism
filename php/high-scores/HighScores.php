<?php

declare(strict_types=1);

class HighScores
{
    public function __construct(
        public array $scores = [],
    ) {
    }

    public function __get($name)
    {
        switch ($name) {
            case 'scores':
                return $this->scores;
            case 'latest':
                return $this->scores[array_key_last($this->scores)];
            case 'personalBest':
                return max($this->scores);
            case 'personalTopThree':
                $scoresCopy = [...$this->scores];
                rsort($scoresCopy);

                return array_slice($scoresCopy, 0, 3);
            default:
                return 'Undefined Property';
        }
    }
}
