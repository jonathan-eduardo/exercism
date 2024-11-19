<?php

declare(strict_types=1);

function encode(string $input): string
{
    preg_match_all('/(.)\1*/', $input, $matches);
    $groups = $matches[0];

    $encoded = array_map(function ($group) {
        $length = strlen($group);

        return $length > 1 ? $length . $group[0] : $group[0];
    }, $groups);

    return join($encoded);
}

function decode(string $input): string
{
    preg_match_all('/(\d+)?([^\d])/', $input, $matches, PREG_SET_ORDER);
    $decoded = '';

    foreach ($matches as [, $count, $character]) {
        $decoded .= str_repeat($character, $count ? (int) $count : 1);
    }

    return $decoded;
}
