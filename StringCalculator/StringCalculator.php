<?php

namespace StringCalculator;

class StringCalculator
{
    public function Add(string $numbers) : int
    {
        if ( $numbers == "" )
            return 0;

        $numbersArray = explode(",", $numbers);

        if ( count($numbersArray) == 1 )
            return (int)$numbersArray[0];

        return (int)$numbersArray[0] + (int)$numbersArray[1];
    }
}
