<?php

declare(strict_types=1);

function language_list(string ...$languages)
{
    return $languages;
}

function add_to_language_list(array $languageList, string $languageToAdd)
{
    return [...$languageList, $languageToAdd];
}

function prune_language_list(array $languageList)
{
    return array_slice($languageList, 1);
}

function current_language(array $languageList)
{
    return $languageList[0];
}

function language_list_length(array $languageList)
{
    return count($languageList);
}
