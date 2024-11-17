<?php

declare(strict_types=1);

class TwelveDays
{
    private const VERSES = [
        'first' => 'a Partridge in a Pear Tree.',
        'second' => 'two Turtle Doves',
        'third' => 'three French Hens',
        'fourth' => 'four Calling Birds',
        'fifth' => 'five Gold Rings',
        'sixth' => 'six Geese-a-Laying',
        'seventh' => 'seven Swans-a-Swimming',
        'eighth' => 'eight Maids-a-Milking',
        'ninth' => 'nine Ladies Dancing',
        'tenth' => 'ten Lords-a-Leaping',
        'eleventh' => 'eleven Pipers Piping',
        'twelfth' => 'twelve Drummers Drumming',
    ];

    public function recite(int $start, int $end): string
    {
        $gifts = array_values(self::VERSES);
        $days = array_keys(self::VERSES);
        $offset = ($end - $start) + 1;
        $verses = '';

        for ($i = 0; $i < $offset; $i++) {
            $currentStep = $start + $i;
            $currentGifts = array_reverse(array_slice($gifts, 0, $currentStep));

            if (count($currentGifts) > 1) {
                array_push($currentGifts, 'and ' . array_pop($currentGifts));
            }

            $giftsAsString = join(', ', $currentGifts);
            $day = $days[$currentStep - 1];
            $lineBreak = $i == $offset - 1 ? '' : PHP_EOL;

            $verses .= 'On the ' .
            $day . ' day of Christmas my true love gave to me: ' .
            $giftsAsString . $lineBreak;
        }
        return $verses;
    }
}
