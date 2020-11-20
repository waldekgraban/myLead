<?php

namespace App\Services;

use App\Repositories\PriceRepositoryInterface;
use App\Price;

class PriceService implements PriceServiceInterface
{
    private PriceRepositoryInterface $priceRepository;

    public function __construct(PriceRepositoryInterface $priceRepository)
    {
        $this->priceRepository = $priceRepository;
    }

    public function getPrice(int $id): Price
    {
        return $this->priceRepository->createPrice($request);
    }

    public function createPrice(Request $request): bool
    {
        return $this->priceRepository->createPrice($request);
    }
}
