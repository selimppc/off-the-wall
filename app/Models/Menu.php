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
class Menu extends Model
{

    protected $table = 'menu';

    protected $fillable = [
        'menu_type_id',
        'name',
        'slug',
        'alias',
        'url',
        'type',
        'status',
        'parent',
        'ext_name',
        'order'
    ];
    public function relMenuType(){
        return $this->belongsTo('App\MenuType', 'menu_type_id', 'id');
    }
    public function relMenu(){
        return $this->belongsTo('App\Menu', 'parent', 'id');
    }
    public function relWidgetMenu(){
        return $this->belongsTo('App\WidgetMenu', 'id', 'menu_id');
    }
}