<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 10/26/15
 * Time: 1:13 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

class CentralSettings extends Model
{

    protected $table = 'central_settings';

    protected $fillable = [
        'title',
        'status',
        'user_type',
        'value',
        'canvas_default_width',
        'canvas_default_height',
        'canvas_base_price',
        'canvas_step_price'
    ];
}