<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
* 
*/

class PlainMirrorFrame extends Model{

	protected $table = 'plain_mirror_frame';

    protected $fillable = [
        'frame_rate',
        'frame_code',
        'frame_rebate',
        'frame_width',
        'frame_height',
        'frame_min_width',
        'frame_max_width',
        'price',
        'image_link',
        'thumb_link',
        'large_image_link',
        'frame_color',
        'frame_material',
        'sort_order',
        'status'
    ];
	

}