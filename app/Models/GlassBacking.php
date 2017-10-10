<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

class GlassBacking extends Model{

	protected $table = 'glass_backing';

    protected $fillable = [
        'type',
        'title',
        'slug',
        'description',
        'status'
    ];

}