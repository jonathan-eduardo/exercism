<?php

declare(strict_types=1);

define('GIGASECOND', 1_000_000_000);

function from(DateTimeImmutable $date): DateTimeImmutable
{
    $timestamp = $date->getTimestamp();
    $newTimestamp = $timestamp + GIGASECOND;

    return $date->setTimestamp($newTimestamp);
}
