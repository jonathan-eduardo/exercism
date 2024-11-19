<?php

declare(strict_types=1);

class Series
{
    public function __construct(private string $input)
    {
    }

    public function largestProduct(int $span): int
    {
        $emptyInputAndSpanIsZero = $this->input === '' && $span === 0;
        $inputNotNumeric = !is_numeric($this->input);
        $negativeSpan = $span < 0;
        $spanLongerThanInput = $span > strlen($this->input);

        if ($emptyInputAndSpanIsZero) {
            return 1;
        }

        if ($inputNotNumeric || $negativeSpan || $spanLongerThanInput) {
            throw new \InvalidArgumentException();
        }

        $products = [];

        for ($i = 0; $i < strlen($this->input); $i++) {
            $serie = str_split(substr($this->input, $i, $span));

            if (count($serie) < $span) {
                continue;
            }

            $product = array_reduce($serie, fn ($carry, $item) => $carry * $item, 1);
            $products[] = $product;
        }

        return max($products);
    }
}
