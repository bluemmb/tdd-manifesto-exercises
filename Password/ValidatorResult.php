<?php

namespace Password;

class ValidatorResult
{
    public bool $valid;
    public ?string $errors;

    /**
     * ValidatorResult constructor.
     * @param bool $valid
     * @param string|array|null $errors
     */
    public function __construct(bool $valid, $errors=null)
    {
        $this->valid = $valid;
        $this->setErrors($errors);
    }

    private function setErrors($errors)
    {
        if ( is_array($errors) )
            $this->errors = join("\n", $errors);
        else
            $this->errors = $errors;
    }
}
