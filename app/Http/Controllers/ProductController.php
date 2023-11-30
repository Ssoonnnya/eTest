<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'brand' => 'required|string',
            'producer' => 'required|string',
            'type' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'weight' => 'required|decimal:2',
            'amount' => 'required|integer',
            'price' => 'required|decimal:2',
        ]);

        $productCreate = Product::create([
            'brand' => $request->get('brand'),
            'producer' => $request->get('producer'),
            'type' => $request->get('type'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'weight' => $request->get('weight'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price')
        ]);

    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(['message' => 'deleted']);
    }
}
