<?php

namespace App\Provider;

use App\Entity\Color;
use App\Entity\Product;
use App\Search\SearchContext;

class FakeProductProvider implements ProviderInterface
{
    public function search(SearchContext $searchContext): array
    {
        $results = [];

        for ($i = 0; $i < $searchContext->getItemsPerPage(); $i++) {
            $results[] = $this->generateFakeProduct();
        }

        return $results;
    }

    private function generateFakeProduct(): Product
    {
        $id = random_int(0, 5000);

        $product = new Product();
        $product->setName("Product n°$id");
        $product->setDescription("Description of product n°$id");
        $product->setPrice(random_int(100, 50000));
        $product->addColor($this->generateFakeColor());
        $product->addColor($this->generateFakeColor());

        return $product;
    }

    private function generateFakeColor(): Color
    {
        $code = bin2hex(random_int(0, 2e6));

        $color = new Color();
        $color->setName("Color #$code");
        $color->setCode($code);
        $color->setReference('A beautiful color.');

        return $color;
    }
}
