<?php

namespace App\Factory;

use App\Entity\Product;

class ProductFactory
{
    public function __construct(
        private readonly ColorFactory $colorFactory,
    ) {
    }

    public function __invoke(): Product
    {
        $id = random_int(0, 5000);

        $product = new Product();
        $product->setName("Product n°$id");
        $product->setDescription("Description of product n°$id");
        $product->setPrice(random_int(100, 50000));
        $product->addColor(($this->colorFactory)());
        $product->addColor(($this->colorFactory)());

        return $product;
    }
}
