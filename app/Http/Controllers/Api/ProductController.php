<?php

namespace App\Http\Controllers\Api;

use App\Application\Catalog\ListProducts;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function __construct(
        private readonly ListProducts $listProducts,
    ) {}

    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection($this->listProducts->execute());
    }
}