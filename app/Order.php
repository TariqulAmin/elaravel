<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
    
        'customer_id',
        'shipping_id',
        'payment_id',
        'order_total',
        'order_status'

    ];
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    } 

    public function shipping()
    {
        return $this->belongsTo('App\Shipping');
    } 

    public function payment()
    {
        return $this->belongsTo('App\Payment');
    } 





    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }


}
