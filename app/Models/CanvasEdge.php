<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
* 
*/
class CanvasEdge extends Model
{

	protected $table = 'canvas_edge';

    protected $fillable = [
        'title',
        'value',
        'image_link',
        'sort_order',
        'status'
    ];

}