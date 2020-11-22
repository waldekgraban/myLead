<?php

namespace App\Repositories;

use App\Price;
use Illuminate\Http\Request;

class PriceRepository implements PriceRepositoryInterface
{
    public function getPrice(int $id): ?Price
    {
        return Price::where('id', $id)->get();
    }

    public function createPrice(Request $request): bool
    {
        $price        = new Price();
        $price->price = $request->price;
        $price->save();
    }

    public function getPriceByAmount(float $amount): ?Price
    {
        return Price::where('price', $amount)->get();
    }
}
