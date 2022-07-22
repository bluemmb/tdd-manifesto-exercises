<?php

namespace StringCalculator;

class StringCalculator
{
    public function Add(string $numbers) : int
    {
        if ( $numbers == "" )
            return 0;

        $numbersArray = $this->splitNumbers($numbers);

        return $this->sumArrayOfNumbers($numbersArray);
    }


    private function splitNumbers($numbers) : array
    {
        return preg_split("/[\n,]/", $numbers);
    }


    private function sumArrayOfNumbers(array $array) : int
    {
        $sum = 0;
        foreach ( $array as $number )
            $sum += (int)$number;

        return $sum;
    }
}
