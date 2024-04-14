<?php

namespace App\Contracts\Services\Order\OrderService;

use App\Contracts\Services\Order\OrderServiceInterface\OrderServiceInterface;
use App\Models\Order;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderService implements OrderServiceInterface
{
    public function __construct(
        protected OrderRepositoryInterface $orderRepository
    ){

    }

    public function createOrder(Order $order)
    {

    }

    public function getOrder(Order $order)
    {

    }
}
