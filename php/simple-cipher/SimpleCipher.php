<?php

declare(strict_types=1);

class SimpleCipher
{
    private string $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    public string $key;

    public function __construct(string $key = null)
    {
        $this->key = $key ?? $this->getRandomKey();

        if (!preg_match("/[a-z]/", $this->key)) {
            throw new InvalidArgumentException();
        }
    }

    private function getRandomKey(int $keyLength = 100): string
    {
        $randomKey = '';

        for ($i = 0; $i < $keyLength; $i++) {
            $randomKey .= $this->alphabet[rand(0, 25)];
        }

        return $randomKey;
    }

    private function rotateAlphabet(int $shiftIndex): string
    {
        $alphabet = $this->alphabet;
        $start = substr($alphabet, $shiftIndex);
        $end = substr($alphabet, 0, $shiftIndex);

        return $start . $end;
    }

    public function encode(string $plainText): string
    {
        $plainTextLength = strlen($plainText);
        $encodedText = '';

        for ($i = 0; $i < $plainTextLength; $i++) {
            $shiftIndex = strpos($this->alphabet, $this->key[$i]);
            $rotatedAlphabet = $this->rotateAlphabet($shiftIndex);
            $plainTextPosition = strpos($this->alphabet, $plainText[$i]);
            $encodedText .= $rotatedAlphabet[$plainTextPosition];
        }
        return $encodedText;
    }

    public function decode(string $cipherText): string
    {
        $cipherTextLength = strlen($cipherText);
        $decodedText = '';

        for ($i = 0; $i < $cipherTextLength; $i++) {
            $shiftIndex = strpos($this->alphabet, $this->key[$i]);
            $rotatedAlphabet = $this->rotateAlphabet($shiftIndex);
            $cipherTextPosition = strpos($rotatedAlphabet, $cipherText[$i]);
            $decodedText .= $this->alphabet[$cipherTextPosition];
        }
        return $decodedText;
    }
}
