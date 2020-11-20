<?php

namespace App;

// use App\Product;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';

    protected $fillable = [
        'price'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'price_product');
    }
}
