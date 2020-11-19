<?php

namespace App;

use App\Price;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description'
    ];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
