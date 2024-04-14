<?php

namespace App\Repositories\Stock;

use App\Models\Product;
use App\Models\Stock;

class StockRepository implements StockRepositoryInterface
{

    public function all()
    {
        return Stock::all();
    }

    public function create(Stock $stock)
    {
        return Stock::create($stock);
    }

    public function update(Stock $stock, $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->update($stock);
        return $stock;
    }

    public function delete($id)
    {
        $user = Stock::findOrFail($id);
        $user->delete();
    }

    public function find($id)
    {
        return Stock::findOrFail($id);
    }
}
