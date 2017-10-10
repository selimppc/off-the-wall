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
class CatGallery extends Model
{

    protected $table = 'cat_gallery';

    protected $fillable = [
        'title','desc','slug','status'
    ];
}