<?php

namespace App\Services;

use App\Product;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function getAllProducts(): Collection;
    public function getProduct(int $id): ?Product;
    public function createProduct(Request $request): bool;
    public function updateProduct(Request $request, int $id): bool;
    public function deleteProduct(int $id): bool;
}
