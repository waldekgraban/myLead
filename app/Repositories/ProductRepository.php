<?php

namespace App\Repositories;

use App\Product;
use App\Services\PriceServiceInterface;

class ProductRepository implements ProductServiceInterface
{
    private PriceServiceInterface $priceService;

    public function __construct(PriceServiceInterface $priceService)
    {
        $this->priceService = $priceService;
    }

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

        $priceIds = collect($request->prices)->map(function ($price) {
            $productPrice = $this->prepareProductPrices($price);
            return [
                $productPrice->id
            ];
        });

        $product->prices()->attach($priceIds);
    }

    private function prepareProductPrices($price): Price
    {
        return $this->priceService->setProductPrice($price);
    }

    public function updateProduct(Request $request, int $id): bool
    {
        $product = Product::find($id);

        if ($product) {
            $product->name        = is_null($request->name) ? $product->name : $product->name;
            $product->description = is_null($request->description) ? $product->description : $product->description;
            $product->save();
        }
    }

    public function deleteProduct(int $id): bool
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }
    }
}
