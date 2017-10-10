<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerreviews extends Model
{
    protected $table = 'customer_review';

    protected $fillable = [
        'name',
        'location',
        'product_id',
        'password',
        'subject',
        'message',
        'status'
    ];
}
