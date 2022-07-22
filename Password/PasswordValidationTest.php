<?php

namespace Password;

use PHPUnit\Framework\TestCase;

class PasswordValidationTest extends TestCase
{
    private PasswordValidation $passwordValidation;

    protected function setUp(): void
    {
        parent::setUp();
        $this->passwordValidation = new PasswordValidation();
    }

    /** @dataProvider provider_valid_passwords_data */
    public function test_valid_passwords($password)
    {
        $result = $this->passwordValidation->validate($password);
        $this->assertSame($result->valid, true);
    }

    public function provider_valid_passwords_data() : array
    {
        return [
            ["1234A5678"],
            ["Abcd1Efgh2"],
            ["A1b2c3d4"],
        ];
    }

    public function test_password_less_than_8_characters_should_be_invalid()
    {
        $result = $this->passwordValidation->validate("1234567");
        $this->assertSame($result->valid, false);
        $this->assertTrue($this->strContains($result->errors, PasswordValidation::ERROR_MIN_LENGTH));
    }

    public function test_password_without_at_least_2_numbers_should_be_invalid()
    {
        $result = $this->passwordValidation->validate("c12abcdsdcsdc");
        $this->assertSame($result->valid, false);
        $this->assertTrue($this->strContains($result->errors, PasswordValidation::ERROR_TWO_NUMBERS));
    }

    public function test_password_should_return_multiple_errors()
    {
        $result = $this->passwordValidation->validate("a1");
        $this->assertSame($result->valid, false);
        $this->assertTrue($this->strContains($result->errors, PasswordValidation::ERROR_MIN_LENGTH));
        $this->assertTrue($this->strContains($result->errors, PasswordValidation::ERROR_TWO_NUMBERS));
    }

    public function test_password_without_capital_letter_should_be_invalid()
    {
        $result = $this->passwordValidation->validate("ab12cd34");
        $this->assertSame($result->valid, false);
        $this->assertTrue($this->strContains($result->errors, PasswordValidation::ERROR_CAPITAL_LETTER));
    }

    private function strContains($haystack, $needle)
    {
        return strpos($haystack, $needle) != -1;
    }
}
