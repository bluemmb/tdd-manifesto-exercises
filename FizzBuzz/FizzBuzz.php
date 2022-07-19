<?php

namespace FizzBuzz;

class FizzBuzz
{
    public function handle(int $number)
    {
        if ( $number % 3 == 0 )
            return "Fizz";

        if ( $number % 5 == 0 )
            return "Buzz";

        return (string)$number;
    }
}
