<?php

declare(strict_types=1);

function isIsogram(string $word): bool
{
    $cleanedWord = strtolower(preg_replace('/[\s-]+/', '', $word));

    for ($i = 0; $i < strlen($cleanedWord); $i++) {
        $wordAsArray = str_split($cleanedWord);
        $currentChar = $wordAsArray[$i];
        $occurrences = count(array_keys($wordAsArray, $currentChar));

        if ($occurrences > 1) {
            return false;
        }
    }

    return true;
}
