<?php

namespace App\Provider;

use App\Entity\Product;
use App\Search\SearchContext;

interface ProviderInterface
{
    /**
     * @return array<Product>
     */
    public function search(SearchContext $searchContext): array;
}
