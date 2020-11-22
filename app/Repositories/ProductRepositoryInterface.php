<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Product;

interface ProductRepositoryInterface
{
    public function getAllProducts(): Collection;
    public function getProduct(int $id): ?Product;
    public function createProduct(Request $request): bool;
    public function updateProduct(Request $request, int $id): bool;
    public function deleteProduct(int $id): bool;
}
