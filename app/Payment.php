<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[

     'payment_method',
     'payment_status'

    ];

    public function order()
    {
        return $this->hasOne('App\Order');
    }
}
