<?php

namespace Password;

class PasswordValidation
{
    public const ERROR_MIN_LENGTH = "Password must be at least 8 characters";
    public const ERROR_TWO_NUMBERS = "The password must contain at least 2 numbers";


    public function validate($password) : ValidatorResult
    {
        $errors = [];

        if ( ! $this->validatePasswordLength($password) )
            $errors[] = self::ERROR_MIN_LENGTH;

        if ( ! $this->validateTwoNumbersInPassword($password) )
            $errors[] = self::ERROR_TWO_NUMBERS;

        if ( count($errors) )
            return new ValidatorResult(false, $errors);

        return new ValidatorResult(true);
    }


    private function validatePasswordLength($password)
    {
        return strlen($password) >= 8;
    }


    private function validateTwoNumbersInPassword($password)
    {
        $i = 0;
        $len = strlen($password);
        $numbersCount = 0;

        while ( $i<$len ) {
            if ( is_numeric($password[$i]) ) {
                $numbersCount++;
                while ( $i<$len && is_numeric($password[$i]) ) $i++;
            }
            else {
                $i++;
            }
        }

        return $numbersCount >= 2;
    }
}
