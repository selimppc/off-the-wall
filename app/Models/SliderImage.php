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
class SliderImage extends Model
{

    protected $table = 'slider_image';

    protected $fillable = [
        'cat_slider_id',
        'name',
        'slug',
        'image',
        'thumbnail',
        'url',
        'status'
    ];
    public function relCatSlider(){
        return $this->belongsTo('App\CatSlider', 'cat_slider_id', 'id');
    }
}