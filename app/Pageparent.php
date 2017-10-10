<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pageparent extends Model
{
   protected $table = 'page_parent';

    protected $fillable = [
        'title',
        'slug'        
    ];
}
