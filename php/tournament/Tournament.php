<?php

declare(strict_types=1);

class Tournament
{
    private array $records = [];

    private function createLine($record)
    {
        [$team, $points, $wins, $draws, $losses, $games] = array_values($record);
        return str_pad($team, 31) . "|  $games |  $wins |  $draws |  $losses |  $points\n";
    }

    private function createResultsTable(): string
    {
        $header = "Team                           | MP |  W |  D |  L |  P\n";
        $table = '';

        foreach ($this->records as $record) {
            $table .= $this->createLine($record);
        }

        return substr($header . $table, 0, -1);
    }

    private function setDraw(string $teamA, string $teamB): void
    {
        $this->records[$teamA]['draw']++;
        $this->records[$teamB]['draw']++;
        $this->records[$teamA]['points']++;
        $this->records[$teamB]['points']++;

    }

    private function setWinner(string $winner): void
    {
        $this->records[$winner]['win']++;
        $this->records[$winner]['points'] += 3;
    }

    private function setLoser(string $loser): void
    {
        $this->records[$loser]['loss']++;
    }

    private function setupTeam(string $name): void
    {
        $this->records[$name] = [
            'team' => $name,
            'points' => 0,
            'win' => 0,
            'draw' => 0,
            'loss' => 0,
            'games' => 0,
        ];
    }

    public function tally(string $scores): string
    {
        $lines = explode("\n", $scores);

        foreach ($lines as $line) {
            if (!$line) {
                return $this->createResultsTable();
            }

            [$teamA, $teamB, $result] = explode(';', $line);

            if (!isset($this->records[$teamA])) {
                $this->setupTeam($teamA);
            }

            if (!isset($this->records[$teamB])) {
                $this->setupTeam($teamB);
            }

            $this->records[$teamA]['games']++;
            $this->records[$teamB]['games']++;

            if ($result === 'win') {
                $this->setWinner($teamA);
                $this->setLoser($teamB);
            } elseif ($result === 'loss') {
                $this->setWinner($teamB);
                $this->setLoser($teamA);
            } else {
                $this->setDraw($teamA, $teamB);
            }
        }

        sort($this->records);
        usort($this->records, fn ($a, $b) => $b['points'] <=> $a['points']);

        return $this->createResultsTable();
    }
}
