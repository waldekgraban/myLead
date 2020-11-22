<?php

namespace App\Repositories;
use Illuminate\Http\Request;
use App\Price;

interface PriceRepositoryInterface
{
    public function createPrice(Request $request): bool;
    public function getPrice(int $id): ?Price;
    public function getPriceByAmount(float $amount): ?Price;
}
