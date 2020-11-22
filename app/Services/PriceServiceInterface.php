<?php

namespace App\Services;

use App\Price;
use Illuminate\Http\Request;

interface PriceServiceInterface
{
    public function getPrice(int $id): ?Price;
    public function createPrice(Request $request): bool;
    public function getPriceByAmount(float $amount): ?Price;
    public function setProductPrice(float $price): Price;
}
