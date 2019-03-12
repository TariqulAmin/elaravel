<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable=[

        'shipping_email',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_address',
        'shipping_mobile_number'

    ];

    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
