<?php

namespace App\Repositories;

use App\Product;
use App\Services\PriceServiceInterface;
use App\Services\ProductServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
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

    public function getProduct(int $id): ?Product
    {
        return Product::where('id', $id)->first();
    }

    public function createProduct(Request $request): bool
    {
        $product              = new Product();
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->save();

        $priceIds = $this->preparePriceIds($request);

        $product->prices()->attach($priceIds);
    }

    private function prepareProductPrices($price): Price
    {
        return $this->priceService->setProductPrice($price);
    }

    private function preparePriceIds($request): Array
    {
        return collect($request->prices)->map(function ($price) {
            $productPrice = $this->prepareProductPrices($price);
            return [
                $productPrice->id
            ];
        });
    }

    public function updateProduct(Request $request, int $id): bool
    {
        $product = Product::find($id);

        if ($product) {
            $product->name = $request->name ?? $product->name;
            $product->description = $request->description ?? $product->description;
            $product->save();

            $priceIds = $this->preparePriceIds($request);

            $product->prices()->sync($priceIds);
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
