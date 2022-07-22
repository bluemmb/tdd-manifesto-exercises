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

    public function test_scan_returns_price_for_barcode()
    {
        $this->assertSame("$7.25", $this->scanning->scan("12345"));
    }
}
