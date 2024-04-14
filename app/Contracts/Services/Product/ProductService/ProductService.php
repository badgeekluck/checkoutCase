<?php

namespace App\Contracts\Services\Product\ProductService;

use App\Contracts\Services\Product\ProductServiceInterface\ProductServiceInterface;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductService implements ProductServiceInterface
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    ){

    }

    public function createProduct(Product $product)
    {
        return $this->productRepository->create($product);
    }

    public function getProduct(Product $product)
    {
        return $this->productRepository->find($product->id);
    }

    public function getAllProduct()
    {
        return $this->productRepository->all();
    }
}
