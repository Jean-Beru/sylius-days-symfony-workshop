<?php

namespace App\Provider;

use App\Factory\ProductFactory;
use App\Search\SearchContext;

class FakeProductProvider implements ProviderInterface
{
    public function __construct(
        private readonly ProductFactory $productFactory,
    ) {
    }

    public function search(SearchContext $searchContext): array
    {
        $results = [];

        for ($i = 0; $i < $searchContext->getItemsPerPage(); $i++) {
            $results[] = ($this->productFactory)();
        }

        return $results;
    }
}
