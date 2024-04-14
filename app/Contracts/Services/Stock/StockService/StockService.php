<?php

namespace App\Contracts\Services\Stock\StockService;

use App\Contracts\Services\Stock\StockServiceInterface\StockServiceInterface;
use App\Models\Stock;
use App\Repositories\Stock\StockRepositoryInterface;

class StockService implements StockServiceInterface
{
    public function __construct(
        protected StockRepositoryInterface $stockRepository
    ){

    }
    public function createStock(Stock $stock)
    {
        return $this->stockRepository->create($stock);
    }

    public function getStock(Stock $stock)
    {
        return $this->stockRepository->find($stock);
    }
}
