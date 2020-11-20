<?php

namespace App\Services;

use App\Price;

interface PriceServiceInterface
{
    public function getPrice(int $id): Price;
    public function createPrice(Request $request): bool;
}
