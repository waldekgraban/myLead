<?php

namespace App\Services;

use App\Repositories\PriceRepositoryInterface;
use App\Price;
use Illuminate\Http\Request;

class PriceService implements PriceServiceInterface
{
    private PriceRepositoryInterface $priceRepository;

    public function __construct(PriceRepositoryInterface $priceRepository)
    {
        $this->priceRepository = $priceRepository;
    }

    public function getPrice(int $id): Price
    {
        return $this->priceRepository->getPrice($request);
    }

    public function getPriceByAmount(float $amount): Price
    {
        return $this->priceRepository->getPriceByAmount($amount);
    }

    public function createPrice(Request $request): bool
    {
        return $this->priceRepository->createPrice($request);
    }

    public function setProductPrice(float $price): Price
    {
        $productPrice = $this->getPriceByAmount($price);

        if(!$productPrice){
            $this->createPrice($price);
            return $this->checkPrice($price);
            //rekurencja, żeby nie powtarzać dwa razy metody getPriceByAmount (zabezpieczyć jeszcze przed nieskończoną pętlą...)
        };

        return $productPrice;
    }
}
