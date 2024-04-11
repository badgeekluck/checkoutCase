<?php

namespace App\Repositories\Product;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function all();

    public function create(Product $product);

    public function update(Product $product, $id);

    public function delete($id);

    public function find($id);
}
