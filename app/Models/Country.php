<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 10/13/15
 * Time: 1:28 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'country';

    public static function country_lists(){
        $result = Country::lists('title', 'id');
        return $result;
    }
}