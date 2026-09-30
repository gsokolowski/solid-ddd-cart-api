<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Catalog\Product as DomainProduct;
use App\Domain\Catalog\ProductRepositoryInterface;
use App\Models\Product as EloquentProduct;

class EloquentProductRepository implements ProductRepositoryInterface
{
    public function all(): array
    {
        return EloquentProduct::query()
            ->orderBy('name')
            ->get()
            ->map(fn (EloquentProduct $product) => new DomainProduct(
                id: $product->id,
                name: $product->name,
                slug: $product->slug,
                price: (string) $product->price,
                stock: $product->stock,
            ))
            ->all();
    }
}