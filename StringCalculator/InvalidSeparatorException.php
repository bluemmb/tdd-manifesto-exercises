<?php

namespace StringCalculator;

class InvalidSeparatorException extends \Exception
{
    public function __construct($line, $position, $expected, $found)
    {
        $message = "'$expected' expected but '$found' found at line $line, position $position.";
        parent::__construct($message);
    }
}
