<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';

    protected $fillable = [
        'product_id',
        'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
