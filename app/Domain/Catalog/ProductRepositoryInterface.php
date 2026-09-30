<?php

namespace App\Domain\Catalog;

interface ProductRepositoryInterface
{
    /**
     * @return list<Product>
     */
    public function all(): array;
}
