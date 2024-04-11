<?php

namespace App\Repositories\Product;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    public function all()
    {
        return Product::all();
    }

    public function create(Product $product)
    {
        return Product::create($product);
    }

    public function update(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($product);
        return $product;
    }

    public function delete($id)
    {
        $user = Product::findOrFail($id);
        $user->delete();
    }

    public function find($id)
    {
        return Product::findOrFail($id);
    }
}
