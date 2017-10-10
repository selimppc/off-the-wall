<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 10/18/15
 * Time: 12:05 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResetPassword extends Model
{

    protected $table = 'user_reset_password';

    public $fillable = [
        'user_id', 'reset_password_token', 'reset_password_expire', 'reset_password_time', 'status',
    ];

    //TODO : Model Relationship
    public function relUser(){
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}