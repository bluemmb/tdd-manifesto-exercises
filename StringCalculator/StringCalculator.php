<?php

namespace StringCalculator;

class StringCalculator
{
    const SEPARATOR_INDICATOR = "//";

    public function Add(string $numbers) : int
    {
        if ( $numbers == "" )
            return 0;

        $numbersArray = $this->splitNumbers($numbers);

        return $this->sumArrayOfNumbers($numbersArray);
    }


    private function splitNumbers($numbers) : array
    {
        $separator = $this->determineSeparator($numbers);
        $lines = explode("\n", $numbers);

        $numbersArray = [];
        for ( $i=0 ; $i<count($lines) ; $i++ ) {
            if ( $i == 0 && $this->startsWithSeparatorIndicator($lines[$i]) )
                continue;

            $numbersInLine = $this->splitNumbersInLine($i, $lines[$i], $separator);
            $numbersArray = array_merge($numbersArray, $numbersInLine);
        }

        return $numbersArray;
    }


    private function splitNumbersInLine($lineNumber, $line, $separator) : array
    {
        $numbersInLine = [];

        $number = "";
        for ( $i=0 ; $i<strlen($line) ; ) {
            $char = $line[$i];

            if ( is_numeric($char) ) {
                $number .= $char;
                $i++;
            }
            else {
                $separatorPosition = strpos($line, $separator, $i);
                if ( $separatorPosition != $i )
                    throw new InvalidSeparatorException($lineNumber, $i, $separator, substr($line, $i, strlen($separator)));

                if ( strlen($number) ) {
                    $numbersInLine[] = $number;
                    $number = "";
                }

                $i += strlen($separator);
            }
        }

        if ( strlen($number) )
            $numbersInLine[] = $number;
        else
            throw new TrailingCommaException();

        return $numbersInLine;
    }


    private function determineSeparator($numbers) : string
    {
        if ( ! $this->startsWithSeparatorIndicator($numbers) )
            return ",";

        $firstNewLinePosition = strpos($numbers, "\n");
        $separatorIndicatorLength = strlen(self::SEPARATOR_INDICATOR);

        return substr($numbers, $separatorIndicatorLength, $firstNewLinePosition - $separatorIndicatorLength);
    }


    private function startsWithSeparatorIndicator($numbers) : bool
    {
        return strpos($numbers, self::SEPARATOR_INDICATOR) === 0;
    }


    private function sumArrayOfNumbers(array $array) : int
    {
        $sum = 0;
        foreach ( $array as $number )
            $sum += (int)$number;

        return $sum;
    }
}
