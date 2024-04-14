<?php

namespace App\Contracts\Services\Stock\StockServiceInterface;

use App\Models\Stock;

interface StockServiceInterface
{
    public function createStock(Stock $stock);

    public function getStock(Stock $stock);
}
