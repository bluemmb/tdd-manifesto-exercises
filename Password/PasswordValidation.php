<?php

namespace Password;

class PasswordValidation
{
    public const ERROR_MIN_LENGTH = "Password must be at least 8 characters";

    public function validate($password) : ValidatorResult
    {
        if ( strlen($password) < 8 )
            return new ValidatorResult(false, self::ERROR_MIN_LENGTH);

        return new ValidatorResult(true);
    }
}
