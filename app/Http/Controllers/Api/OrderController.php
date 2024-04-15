<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Order\OrderService\OrderService;
use App\Contracts\Services\Stock\StockService\StockService;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $orderStoreRequest, OrderService $orderService, StockService $stockService)
    {
        $orderStoreRequest->validated($orderStoreRequest->only(['product_id', 'quantity']));

        $stock = $stockService->checkStock($orderStoreRequest->product_id);

        $totalPrice = ($stock[0]['product']['price']) * $orderStoreRequest->quantity;

        $dbStock = $stock[0]['quantity'];

        if ($dbStock < $orderStoreRequest->quantity) {
            return $this->error('', 'Stock is not enough', 401);
        }

        try {
            DB::beginTransaction();

            $orderService->createOrder($orderStoreRequest, Auth::user()->id, $totalPrice);

            $stockService->updateStock($orderStoreRequest);

            DB::commit();
        }  catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return $this->success('','order is created', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
