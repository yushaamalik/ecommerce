<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    protected $fillable = ['product_id', 'category_id'];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
