<?php

namespace Password;

class ValidatorResult
{
    public bool $valid;
    public string $error;

    public function __construct(bool $valid, string $error="")
    {
        $this->valid = $valid;
        $this->error = $error;
    }
}
