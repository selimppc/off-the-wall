<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 11/24/15
 * Time: 4:36 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;
class BlogItem extends Model
{

    protected $table = 'blog_item';

    protected $fillable = [
        'title','slug','blog_cat_id','desc','meta_title','meta_keyword','meta_desc','status','created_by'
    ];

    public function relBlogCat(){
        return $this->belongsTo('App\BlogCat', 'blog_cat_id', 'id');
    }
}