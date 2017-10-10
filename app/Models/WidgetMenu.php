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
class WidgetMenu extends Model
{

    protected $table = 'widget_menu';

    protected $fillable = [
        'widget_id','menu_id'
    ];
    public function selectWidget(){
        return $this->belongsTo('App\Widget', 'widget_id', 'id');
    }
    public function relMenu(){
        return $this->belongsTo('App\Menu', 'menu_id', 'id');
    }
}