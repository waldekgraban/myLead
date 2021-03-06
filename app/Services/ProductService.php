<?php

namespace App\Services;

use App\Product;
use App\Repositories\ProductRepositoryInterface;
use App\Services\ProductServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;


class ProductService implements ProductServiceInterface 
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts(): Collection
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProduct(int $id): ?Product
    {
        return $this->productRepository->getProduct($id);
    }

    public function createProduct(Request $request): bool
    {
        return $this->productRepository->createProduct($request);
    }

    public function updateProduct(Request $request, int $id): bool
    {
        return $this->productRepository->updateProduct($request, $id);
    }

    public function deleteProduct(int $id): bool
    {
        return $this->productRepository->deleteProduct($id);
    }
}
