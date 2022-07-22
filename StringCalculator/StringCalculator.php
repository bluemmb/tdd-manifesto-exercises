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
        $this->validateLines($numbers);
        return preg_split("/[\n,]/", $numbers);
    }


    private function validateLines($numbers) : void
    {
        $lines = explode("\n", $numbers);

        foreach ( $lines as $line )
            if ( strlen($line) && substr($line, -1) == "," )
                throw new TrailingCommaException();
    }


    private function sumArrayOfNumbers(array $array) : int
    {
        $sum = 0;
        foreach ( $array as $number )
            $sum += (int)$number;

        return $sum;
    }
}
