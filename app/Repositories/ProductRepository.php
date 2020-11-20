<?php

namespace App\Repositories;

use App\Product;

class ProductRepository implements ProductServiceInterface
{
    public function getAllProducts(): Collection
    {
        return Product::get();
    }

    public function getProduct(int $id): Product
    {
        return Product::where('id', $id)->get();
    }

    public function createProduct(Request $request): bool
    {
        $product              = new Product();
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->save();

    }

    public function updateProduct(Request $request, int $id): bool
    {
        $product = Product::find($id);

        $product->name   = is_null($request->name) ? $product->name : $product->name;
        $product->author = is_null($request->author) ? $product->author : $product->author;
        $product->save();
    }

    public function deleteProduct(int $id): bool
    {
        $product = Product::find($id);
        if($product) return $product->delete();
    }
}
