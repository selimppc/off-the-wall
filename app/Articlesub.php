<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articlesub extends Model
{
     protected $table = 'article_sub';

    protected $fillable = [
        'article_id',
        'title',
        'status',
        'image',
        'desc'
    ];
}
