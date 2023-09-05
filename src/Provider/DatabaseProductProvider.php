<?php

namespace App\Provider;

use App\Entity\Color;
use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Search\SearchContext;

class DatabaseProductProvider implements ProviderInterface
{
    public function __construct(
        private readonly ProductRepository $productRepository,
    ) {
    }

    public function search(SearchContext $searchContext): array
    {
        return $this->productRepository->createQueryBuilder('p')
            ->where('p.name LIKE :term')
            ->setParameter('term', '%'.$searchContext->getTerm().'%')
            ->setMaxResults($searchContext->getItemsPerPage())
            ->setFirstResult(($searchContext->getPage() - 1) * $searchContext->getItemsPerPage())
            ->getQuery()
            ->getResult();
    }
}
