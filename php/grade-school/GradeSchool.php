<?php

declare(strict_types=1);

class GradeSchool
{
    public array $students = [];

    public function add(string $name, int $grade): bool
    {
        if (in_array($name, $this->roster())) {
            return false;
        }

        $this->students[$grade][] = $name;
        sort($this->students[$grade]);

        return true;
    }

    public function grade(int $grade): array
    {
        return $this->students[$grade] ?? [];
    }

    public function roster(): array
    {
        ksort($this->students);
        $allStudents = [];

        foreach ($this->students as $studentsNames) {
            array_push($allStudents, ...$studentsNames);
        }

        return $allStudents;
    }
}
