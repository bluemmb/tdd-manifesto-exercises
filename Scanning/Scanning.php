<?php

namespace Scanning;

class Scanning
{
    public const ERROR_NOT_FOUND = "Error: barcode not found";

    private array $prices = [
        "12345" => 7.25,
        "23456" => 12.50,
    ];

    public function scan($barcode)
    {
        if ( ! array_key_exists($barcode, $this->prices) )
            return self::ERROR_NOT_FOUND;

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
