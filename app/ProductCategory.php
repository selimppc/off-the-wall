<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_category';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'image',
        'subgroup_id',
        'group_id',
    ];

    public function relCatgroup(){
        return $this->belongsTo('App\ProductGroup', 'group_id', 'id');
    }

    public function relCatsubgroup(){
        return $this->belongsTo('App\ProductSubgroups', 'subgroup_id', 'id');
    }
}


