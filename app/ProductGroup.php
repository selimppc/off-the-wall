<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $table = 'groups';

    protected $fillable = [
        'title',
        'slug',
        'sortorder',
        'status'        
    ];
}
