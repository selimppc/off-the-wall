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
class Media extends Model
{

    protected $table = 'media';

    protected $fillable = [
        'file_name','thumbnail','type','alt_text','url'
    ];
}