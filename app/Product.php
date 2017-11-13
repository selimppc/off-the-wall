<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $table = 'product';

    protected $fillable = [
        'product_category_id',
        'product_group_id',
        'product_subgroup_id',
        'title',
        'slug',
        'short_description',
        'long_description',
        'status',
        'sku',
        'class',
        'group',
        'sell_rate',
        'sell_unit',
        'cost_price',
        'before_price',
        'sell_unit_quantity',
        'stock_unit',
        'stock_unit_quantity',
        'is_price_vary',
        'is_featured',
        'image',
        'thumb',
        'features',
        'sort_order',
        'product_code',
        'size',
        'other_size',
        'meta_title',
        'delivery_info',
        'meta_keyword',
        'meta_desc',
        'weight'
        
    ];

     public function relCatProduct(){
        return $this->belongsTo('App\ProductCategory', 'product_category_id', 'id');
    }

     public function relProductGroup(){
        return $this->belongsTo('App\ProductGroup', 'product_group_id', 'id');
    }

    public function relSubGroup(){
        return $this->belongsTo('App\ProductSubgroups', 'product_subgroup_id', 'id');
    }

     public function relGetproductgroup(){
        return $this->hasOne('App\ProductGroup', 'id', 'product_group_id');
    }

     public function relGetproductsubgroup(){
        return $this->hasOne('App\ProductSubgroups', 'id', 'product_subgroup_id');
    }
}
