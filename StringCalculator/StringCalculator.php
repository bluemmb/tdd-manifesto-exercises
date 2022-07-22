<?php

namespace StringCalculator;

class StringCalculator
{
    public function Add(string $numbers) : int
    {
        if ( $numbers == "" )
            return 0;

        $numbersArray = explode(",", $numbers);
        return $this->sumArrayOfNumbers($numbersArray);
    }


    private function sumArrayOfNumbers(array $array) : int
    {
        $sum = 0;
        foreach ( $array as $number )
            $sum += (int)$number;

        return $sum;
    }
}
