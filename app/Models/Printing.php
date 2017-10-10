<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

class Printing extends Model{

	protected $table = 'printing';

    protected $fillable = [
        'type',
        'title',
        'slug',
        'description',
        'status'
    ];
    
}