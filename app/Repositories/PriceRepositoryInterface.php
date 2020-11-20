<?php

namespace App\Repositories;

interface PriceRepositoryInterface
{
    public function createPrice(Request $request): bool;
    public function getPrice(int $id): Price;
}