<?php

declare(strict_types=1);

class Bob
{
    public function respondTo(string $str): string
    {
        $isAQuestion = str_ends_with(trim($str), "?");
        $isSilence = preg_match("/^\s*$/", $str);
        $isYelling = preg_match("/^[^a-z]*[A-Z][^a-z]*$/", $str);

        if ($isAQuestion) {
            return $isYelling ? "Calm down, I know what I'm doing!" : "Sure.";
        } elseif ($isYelling) {
            return "Whoa, chill out!";
        } elseif ($isSilence) {
            return "Fine. Be that way!";
        } else {
            return "Whatever.";
        }
    }
}
