<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
* 
*/
class PhotoFrame extends Model
{
	
	protected $table = 'photo_frame';

    protected $fillable = [
        'frame_category_id',
        'frame_code',
        'frame_width',
        'frame_depth',
        'frame_rebate',
        'frame_rate',
        'frame_min',
        'frame_max',
        'price',
        'sort_order',
        'status',
        'image_link',
        'thumb_link'
    ];
	

    public function relCategory(){
         return $this->hasOne('App\FrameCategory', 'id', 'frame_category_id');
    }

}