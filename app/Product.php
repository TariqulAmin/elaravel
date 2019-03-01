<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
   
        'category_id',
        'brand_id',
        'product_name',
        'product_short_description',
        'product_long_description',
        'product_price',
        'product_image',
        'product_size',
        'product_color',
        'publication_status'

    
    ];

     public function category()
     {
         return $this->belongsTo('App\Category');
     }
     public function brand()
     {
         return $this->belongsTo('App\Brand');
     }
}
