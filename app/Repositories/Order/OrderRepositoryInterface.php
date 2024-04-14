<?php

namespace App\Repositories\Order;

use App\Models\Order;

interface OrderRepositoryInterface
{
    public function all();

    public function create(Order $order);

    public function update(Order $order, $id);

    public function delete($id);

    public function find($id);
}
