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

    public function createOrder($orderRequest, $userId, $totalPrice)
    {

        Order::create([
            'user_id' => $userId,
            'product_id' => $orderRequest->product_id,
            'status' => 'PENDING',
            'total_price' => $totalPrice,
        ]);

    }

    public function getOrder(Order $order)
    {

    }
}
