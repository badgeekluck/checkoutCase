<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Services\Product\ProductService\ProductService;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductService $productService): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'All products less than 500 quantity',
            'data' => $productService->getAllProduct()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductService $productService, Product $product): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'single product info',
            'data' => $productService->getProduct($product)
        ]);
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
