<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubgroups extends Model
{
    protected $table = 'product_subgroup';

    protected $fillable = [
        'product_group_id',
        'title',
        'slug',
        'sort_order',
        'status',
        'image',
        'thumb',
	'meta_title',
	'meta_keyword',
	'meta_desc',
	'short_desc'
    ];

    public function relGroup(){
        return $this->belongsTo('App\ProductGroup', 'product_group_id', 'id');
    }
}
