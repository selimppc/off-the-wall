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
class BlogComment extends Model
{

    protected $table = 'blog_comment';

    protected $fillable = [
        'blog_item_id','name','email','comment','status','created_by'
    ];

    public function relBlogItem(){
        return $this->belongsTo('App\BlogItem', 'blog_item_id', 'id');
    }
}