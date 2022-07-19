<?php

namespace FizzBuzz;

class FizzBuzz
{
    public function handle(int $number)
    {
        if ( $number % 3 == 0 )
            return "Fizz";

        return (string)$number;
    }
}
