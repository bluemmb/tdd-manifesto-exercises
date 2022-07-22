<?php

namespace Search;

class Search
{
    private array $cities;

    public function __construct()
    {
        $this->cities = Cities::load();
    }

    public function handle(string $query) : array
    {
        if ( strlen($query) < 2 )
            return [];

        return $this->cities[0];
    }
}
