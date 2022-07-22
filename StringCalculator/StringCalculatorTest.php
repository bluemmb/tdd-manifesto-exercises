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

    public function test_add_returns_sum_of_any_number_of_comma_separated_numbers()
    {
        self::assertSame(6, $this->stringCalculator->Add("1,2,3"));
        self::assertSame(15, $this->stringCalculator->Add("1,2,3,4,5"));
    }

    public function test_add_can_use_newline_as_separator()
    {
        self::assertSame(15, $this->stringCalculator->Add("1,2\n3\n4,5"));
    }
}
