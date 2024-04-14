<?php

namespace App\Contracts\Services\Product\ProductServiceInterface;

use App\Models\Product;

interface ProductServiceInterface
{
    public function createProduct(Product $product);

    public function getProduct(Product $product);
}
