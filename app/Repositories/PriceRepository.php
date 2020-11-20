<?php

namespace App\Repositories;

use App\Price;

class PriceRepository implements PriceRepositoryInterface
{
    public function getPrice(int $id): Price
    {
        return Price::where('id', $id)->get();
    }

    public function createPrice(Request $request): bool
    {
        $price        = new Price();
        $price->price = $request->price;
        $price->save();
    }
}
