<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price', 'stock'];

    public function getAllProduct ()
    {
        $products = Product::all();
        return $products;
    }
}
