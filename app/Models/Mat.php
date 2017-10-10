<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

/**
* 
*/
class Mat extends Model
{
	protected $table = 'mat';

    protected $fillable = [
        'color',
        'name',
        'code',
        'status'
    ];
}