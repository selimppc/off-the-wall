<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productvariation extends Model
{
    
    protected $table = 'product_variation';

    protected $fillable = [
        'product_id',
        'title',
        'slug',
        'size',
        'color',
        'sell_quantity',
        'stock_balance',
        'sell_rate',
        'sku',
        'cost_price',
        'status'
    ];

     public function relProduct(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
