<?php

namespace Scanning;

class Scanning
{
    private array $prices = [
        "12345" => 7.25,
        "23456" => 12.50,
    ];

    public function scan($barcode)
    {
        $price = $this->prices[$barcode];
        return $this->priceToString($price);
    }

    private function priceToString($price)
    {
        $decimal = (int)$price;
        $float = (int)(($price - $decimal) * 100);

        return "$" . $decimal . "." . str_pad($float, 2, "0");
    }
}
