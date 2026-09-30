<?php

namespace App\Application\Catalog;

use App\Domain\Catalog\ProductRepositoryInterface;

class ListProducts
{
    public function __construct(
        private readonly ProductRepositoryInterface $products,
    ) {}

    /**
     * @return list<\App\Domain\Catalog\Product>
     */
    public function execute(): array
    {
        return $this->products->all();
    }
}