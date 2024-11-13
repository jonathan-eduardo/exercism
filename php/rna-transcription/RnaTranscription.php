<?php

declare(strict_types=1);

function toRna(string $dna): string
{
    $rna = '';
    $complements = ['G' => 'C', 'C' => 'G', 'T' => 'A', 'A' => 'U'];

    for ($i = 0; $i < strlen($dna); $i++) {
        $rna .= $complements[$dna[$i]];
    }

    return $rna;
}
