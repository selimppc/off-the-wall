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
class Widget extends Model
{

    protected $table = 'widget';

    protected $fillable = [
        'title','content','order','position','status','widget_name','showtitle','slug'
    ];
    public function relWidgetMenu(){
        return $this->HasMany('App\WidgetMenu', 'id', 'widget_id');
    }


    public static function scopePositionName($query){
        $query = array(
            ''=>'Select Widget Position',
            'footer_one'=>'Footer One',
            'footer_two'=>'Footer Two',
            'footer_three'=>'Footer Three',
            'footer_four'=>'Footer Four',
        );
        return $query;
    }
}