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

    public function test_password_must_be_at_least_8_characters()
    {
        $result = $this->passwordValidation->validate("1234567");
        $this->assertSame($result->valid, false);
        $this->assertSame($result->error, PasswordValidation::ERROR_MIN_LENGTH);
    }
}
