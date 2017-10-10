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
class GalImage extends Model
{

    protected $table = 'gal_image';

    protected $fillable = [
        'product_id','name','slug','image','thumbnail','status'
    ];
    public function relProductGallery(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}