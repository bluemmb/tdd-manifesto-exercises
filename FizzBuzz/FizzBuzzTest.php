<?php

namespace FizzBuzz;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function test_fizzbuzz_returns_string()
    {
        $fizzBuzz = new FizzBuzz();
        $string = $fizzBuzz->handle(22);
        $this->assertSame("22", $string);
    }

    public function test_fizzbuzz_returns_fizz_for_multiple_of_three()
    {
        $fizzBuzz = new FizzBuzz();
        $string = $fizzBuzz->handle(6);
        $this->assertSame("Fizz", $string);
    }
}
