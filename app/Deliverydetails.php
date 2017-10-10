<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliverydetails extends Model
{
     protected $table = 'deliverydetails';

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'user_id',
        'suburb',
        'postcode',
        'state',
        'address',
        'country',
        'telephone'
    ];
}
