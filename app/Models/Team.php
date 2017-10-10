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
class Team extends Model
{

    protected $table = 'team';

    protected $fillable = [
        'first_name','last_name','slug','email','phone','twitter','facebook','google_plus','linkedin','image','designation','responsibility','status'];
}