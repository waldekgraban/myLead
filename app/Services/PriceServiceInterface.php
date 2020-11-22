<?php

namespace App\Services;

use App\Price;

interface PriceServiceInterface
{
    public function getPrice(int $id): ?Price;
    public function createPrice(Request $request): bool;
    public function getPriceByAmount(float $amount): ?Price;
    public function setProductPrice(float $price): Price;
}
