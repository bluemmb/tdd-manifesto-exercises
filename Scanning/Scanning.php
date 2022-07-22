<?php

namespace Scanning;

class Scanning
{
    public const ERROR_NOT_FOUND = "Error: barcode not found";
    public const ERROR_EMPTY_BARCODE = "Error: empty barcode";

    private array $prices = [
        "12345" => 7.25,
        "23456" => 12.50,
    ];

    public function scan(string $barcode) : string
    {
        $price = $this->getPriceWithBarcode($barcode);
        if ( is_string($price) )
            return $price;

        return $this->priceToString($price);
    }


    public function total(array $barcodes) : string
    {
        $priceSum = 0;

        for ( $i=0 ; $i<count($barcodes) ; $i++ )
        {
            $barcode = $barcodes[$i];
            $price = $this->getPriceWithBarcode($barcode);
            if ( is_string($price) )
                return "Item $i: " . $price;

            $priceSum += $price;
        }

        return $this->priceToString($priceSum);
    }


    private function getPriceWithBarcode(string $barcode)
    {
        if ( strlen($barcode) == 0 )
            return self::ERROR_EMPTY_BARCODE;

        if ( ! array_key_exists($barcode, $this->prices) )
            return self::ERROR_NOT_FOUND;

        return $this->prices[$barcode];
    }


    private function priceToString(float $price) : string
    {
        $decimal = (int)$price;
        $float = (int)(($price - $decimal) * 100);

        return "$" . $decimal . "." . str_pad($float, 2, "0");
    }
}
