<?php

namespace Scanning;

use PHPUnit\Framework\TestCase;

class ScanningTest extends TestCase
{
    public Scanning $scanning;

    protected function setUp(): void
    {
        parent::setUp();
        $this->scanning = new Scanning();
    }

    public function test_scan_returns_price_for_barcode_12345()
    {
        $this->assertSame("$7.25", $this->scanning->scan("12345"));
    }

    public function test_scan_returns_price_for_barcode_23456()
    {
        $this->assertSame("$12.50", $this->scanning->scan("23456"));
    }

    public function test_scan_returns_error_for_barcode_that_not_exists()
    {
        $this->assertSame(Scanning::ERROR_NOT_FOUND, $this->scanning->scan("99999"));
    }

    public function test_scan_returns_error_for_empty_barcode()
    {
        $this->assertSame(Scanning::ERROR_EMPTY_BARCODE, $this->scanning->scan(""));
    }

    public function test_total_method_should_return_sum_of_the_prices()
    {
        $this->assertSame("$19.75", $this->scanning->total(["12345", "23456"]));
    }

    public function test_total_returns_error_for_barcode_that_not_exists()
    {
        $this->assertSame("Item 1: " . Scanning::ERROR_NOT_FOUND, $this->scanning->total(["12345", "99999"]));
    }

    public function test_total_returns_error_for_empty_barcode()
    {
        $this->assertSame("Item 0: " . Scanning::ERROR_EMPTY_BARCODE, $this->scanning->total([""]));
    }
}
