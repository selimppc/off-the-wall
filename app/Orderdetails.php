<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'order_head_id',
        'product_id',
        'product_variation_id',
        'qty',
        'price',
        'status',
        'details',
        'image_link',
        'original_image_link'
    ];
}
