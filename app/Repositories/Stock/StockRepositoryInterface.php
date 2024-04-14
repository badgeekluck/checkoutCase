<?php

namespace App\Repositories\Stock;

use App\Models\Stock;

interface StockRepositoryInterface
{
    public function all();

    public function create(Stock $stock);

    public function update(Stock $stock, $id);

    public function delete($id);

    public function find($id);
}
