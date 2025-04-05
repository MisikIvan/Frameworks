<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'Phone', 'price' => 999],
        ['id' => 2, 'name' => 'Laptop', 'price' => 1500],
    ];


    public function index(): JsonResponse
    {
        return response()->json(['data' => $this->products]);
    }


    public function show(int $id): JsonResponse
    {
        $product = collect($this->products)->firstWhere('id', $id);

        if (!$product) {
            return response()->json(
                ['error' => 'Product not found'],
                404
            );
        }

        return response()->json(['data' => $product]);
    }


    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $newProduct = [
            'id' => rand(1000, 9999),
            ...$data
        ];


        return response()->json(['data' => $newProduct], 201);
    }
}