<?php

namespace StringCalculator;

class StringCalculator
{
    public function Add(string $numbers) : int
    {
        if ( $numbers == "" )
            return 0;

        throw new \Exception();
    }
}
