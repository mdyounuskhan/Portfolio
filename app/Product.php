<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
   use SoftDeletes;
    protected $fillable = ['product_name', 'product_description', 'price', 'product_stock', 'stock_alert', 'product_image' ];

     function relationtocategory()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
}







