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
}
