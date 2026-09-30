<?php

namespace App\Domain\Catalog;

class Product {
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly string $price,
        public readonly int $stock,
    ) {}
}