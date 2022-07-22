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
        if ( $query == "*" )
            return $this->cities;

        if ( strlen($query) < 2 )
            return [];

        $query = strtolower($query);

        $result = [];
        foreach ( $this->cities as $city )
            if ( strpos(strtolower($city), $query) !== false )
                $result[] = $city;

        return $result;
    }
}
