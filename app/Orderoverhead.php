<?php

namespace App;

use App\Customer;
use App\Orderdetails;

use Illuminate\Database\Eloquent\Model;

class Orderoverhead extends Model
{
   protected $table = 'order_overhead';

    protected $fillable = [
        'invoice_id',
        'user_id',
        'shipping_type',
        'shipping_value',
        'total_discount_price',
        'vat',
        'net_amount',
        'status',
        'type'
        
    ];

     public function relCustomer(){
        return $this->belongsTo('App\Customer', 'user_id', 'id');
    }

    public function relOrderDetail()
    {
        return $this->HasMany('App\Orderdetails', 'order_head_id');
    }
}
