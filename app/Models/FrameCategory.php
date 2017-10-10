<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
* 
*/
class FrameCategory extends Model
{
	
	protected $table = 'frame_category';

    protected $fillable = [
        'title',
        'slug',
        'sort_order',
        'status'
    ];

     public function relFrame()
    {
        return $this->HasMany('App\PhotoFrame', 'frame_category_id')->where('status','active');
    }
}