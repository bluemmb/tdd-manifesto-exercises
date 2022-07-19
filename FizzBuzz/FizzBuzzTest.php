<?php

namespace FizzBuzz;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    private FizzBuzz $fizzBuzz;

    protected function setUp(): void
    {
        parent::setUp();
        $this->fizzBuzz = new FizzBuzz();
    }

    public function test_fizzbuzz_returns_string()
    {
        $string = $this->fizzBuzz->handle(22);
        $this->assertSame("22", $string);
    }

    public function test_fizzbuzz_returns_fizz_for_multiple_of_three()
    {
        $string = $this->fizzBuzz->handle(6);
        $this->assertSame("Fizz", $string);
    }

    public function test_fizzbuzz_returns_buzz_for_multiple_of_five()
    {
        $string = $this->fizzBuzz->handle(10);
        $this->assertSame("Buzz", $string);
    }

    public function test_fizzbuzz_returns_fizzbuzz_for_multiple_of_three_and_five()
    {
        $string = $this->fizzBuzz->handle(15);
        $this->assertSame("FizzBuzz", $string);
    }
}
