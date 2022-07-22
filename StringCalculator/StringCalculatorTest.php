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
}
