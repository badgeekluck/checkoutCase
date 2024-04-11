<?php

namespace App\Contracts\Services\ProductService;

use App\Models\Product;

interface ProductServiceInterface
{
    public function createProduct(Product $product);

    public function getProduct(Product $product);
}
