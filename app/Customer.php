<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table = 'customer';

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'password',
        'suburb',
        'postcode',
        'state',
        'address',
        'country',
        'telephone'
    ];
}
