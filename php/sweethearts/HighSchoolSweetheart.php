<?php

declare(strict_types=1);

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return substr(trim($name), 0, 1);
    }

    public function initial(string $name): string
    {
        return ucfirst($this->firstLetter($name)) . '.';
    }

    public function initials(string $name): string
    {
        [$firstName, $lastName] = explode(" ", $name);

        return $this->initial($firstName) . ' ' . $this->initial($lastName);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $nameA = $this->initials($sweetheart_a);
        $nameB = $this->initials($sweetheart_b);

        return $this->createHeart($nameA, $nameB);
    }

    private function createHeart(string $nameA, string $nameB): string
    {
        return <<<TEXT_HEART
        ******       ******
      **      **   **      **
    **         ** **         **
   **            *            **
   **                         **
   **     $nameA  +  $nameB     **
    **                       **
      **                   **
        **               **
          **           **
            **       **
              **   **
                ***
                 *
   TEXT_HEART;
    }
}
