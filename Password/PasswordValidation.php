<?php

namespace Password;

class PasswordValidation
{
    public const ERROR_MIN_LENGTH = "Password must be at least 8 characters";

    public function validate($password) : ValidatorResult
    {
        if ( ! $this->validatePasswordLength($password) )
            return new ValidatorResult(false, self::ERROR_MIN_LENGTH);

        return new ValidatorResult(true);
    }

    private function validatePasswordLength($password)
    {
        return strlen($password) >= 8;
    }
}
