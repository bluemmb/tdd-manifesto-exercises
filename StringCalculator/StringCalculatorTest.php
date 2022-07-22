<?php

namespace StringCalculator;

use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->stringCalculator = new StringCalculator();
    }

    public function test_add_returns_zero_for_empty_strings()
    {
        self::assertSame(0, $this->stringCalculator->Add(""));
    }

    public function test_add_returns_integer_of_given_single_number_string()
    {
        self::assertSame(1, $this->stringCalculator->Add("1"));
    }

    public function test_add_returns_sum_of_two_comma_separated_numbers()
    {
        self::assertSame(3, $this->stringCalculator->Add("1,2"));
    }
}
