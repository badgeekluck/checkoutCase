<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Models\Product;

class OrderRepository implements OrderRepositoryInterface
{

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function create(Order $order)
    {
        return Order::create($order);
    }

    public function update(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($order);
        return $order;
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function findStockByProductId($productId)
    {
        return Order::withWhereHas('products', fn($query) => $query->where('product_id', '=', $productId))->get();
    }
}
