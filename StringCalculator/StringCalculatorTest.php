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

    public function test_add_should_throw_error_on_trailing_comma()
    {
        $this->expectException(TrailingCommaException::class);
        $this->stringCalculator->Add("1,2\n3,");
    }

    /** @dataProvider provider_custom_separators_data */
    public function test_add_should_accept_custom_separators($expected, $numbers)
    {
        self::assertSame($expected, $this->stringCalculator->Add($numbers));
    }

    public function provider_custom_separators_data() : array
    {
        return [
            [6, "//|\n1|2\n3"],
            [21, "//;\n1;2;3\n4;5\n6"],
            [21, "//sep\n1sep2sep3\n4sep5\n6"],
        ];
    }

    /** @dataProvider provider_invalid_separator_data */
    public function test_add_should_throw_exception_with_correct_message_for_invalid_separator($numbers, $message)
    {
        $this->expectException(InvalidSeparatorException::class);
        $this->expectExceptionMessage($message);
        $this->stringCalculator->Add($numbers);
    }

    public function provider_invalid_separator_data() : array
    {
        return [
            [
                "1;2",
                (new InvalidSeparatorException(0, 1, ",", ";"))->getMessage(),
            ],
            [
                "//|\n1|2\n3;4",
                (new InvalidSeparatorException(2, 1, "|", ";"))->getMessage(),
            ],
            [
                "//sep\n1sep2set3\n4sep5\n6",
                (new InvalidSeparatorException(1, 5, "sep", "set"))->getMessage(),
            ],
        ];
    }
}
