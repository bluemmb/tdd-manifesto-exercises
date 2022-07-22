<?php

namespace Search;

use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    private Search $search;

    protected function setUp(): void
    {
        parent::setUp();
        $this->search = new Search();
    }

    public function test_search_should_return_empty_result_for_less_than_2_chars()
    {
        $result = $this->search->handle("a");
        $this->assertCount(0, $result);
    }

    public function test_search_should_return_cities_starting_with_query()
    {
        $result = $this->search->handle("Va");
        $this->assertEqualsCanonicalizing(
            ["Valencia", "Vancouver"],
            $result,
        );
    }
}
