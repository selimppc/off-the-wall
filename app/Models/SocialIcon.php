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
class SocialIcon extends Model
{

    protected $table = 'social_icon';

    protected $fillable = [
        'title',
        'link',
        'icon',
        'status',
        'slug'
    ];

}