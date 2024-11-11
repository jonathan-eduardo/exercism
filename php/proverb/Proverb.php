<?php

declare(strict_types=1);

class Proverb
{
    public function recite(array $verses): array
    {
        $proverbs = [];
        $versesLength = count($verses);

        if (!$versesLength) {
            return $proverbs;
        }

        $lastProverb = "And all for the want of a $verses[0].";

        for ($i = 0; $i < $versesLength - 1; $i++) {
            [$verseA, $verseB] = [$verses[$i], $verses[$i + 1]];
            $proverbs[] = "For want of a $verseA the $verseB was lost.";
        }

        return [...$proverbs, $lastProverb];
    }
}
