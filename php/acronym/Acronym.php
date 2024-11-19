<?php

declare(strict_types=1);

function acronym(string $text): string
{
    $spllitedWords = preg_split('/[\s-]/', $text, -1, PREG_SPLIT_NO_EMPTY);

    $initials = array_map(function (string $word) {
        return strtoupper($word[0]);
    }, $spllitedWords);

    return join($initials);
}
