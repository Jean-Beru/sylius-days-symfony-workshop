<?php

namespace App\Provider;

use App\Entity\Product;
use App\Search\SearchContext;
use Symfony\Component\DependencyInjection\Attribute\AsDecorator;

#[AsDecorator(decorates: FakeProductProvider::class)]
class PrefixedFakeProductProvider implements ProviderInterface
{
    public function __construct(
        private readonly ProviderInterface $provider,
        private readonly string $prefix = '[FAKE] ',
    ) {
    }

    public function search(SearchContext $searchContext): array
    {
        return array_map(
            function (Product $product): Product {
                $product->setName($this->prefix.$product->getName());

                return $product;
            },
            $this->provider->search($searchContext)
        );
    }
}
