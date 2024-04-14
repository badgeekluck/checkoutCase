<?php

namespace App\Repositories\Product;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    public function all()
    {
        return Product::withWhereHas('stock', fn($query) => $query->where('quantity', '<', '500'))->get();
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
        $product = Product::findOrFail($id);
        $product->delete();
    }

    public function find($id)
    {
        return Product::withWhereHas('stock', fn($query) => $query->where('id', '=', $id))->get();
    }
}
