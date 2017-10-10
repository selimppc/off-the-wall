<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests;
//use Route;
use Input;
use Route;


class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        //$id = Route::input('id')?Route::input('id'):'';
        $id = Route::input('id');

        if($id==null)
        {
            return [
                'first_name' => 'required|max:64',
                'email' => 'required',
                'password' => 'required|max:64',
                'confirm_password' => 'required|same:password',
                 'image'=>'mimes:png,gif,jpeg,txt,pdf,doc,jpg',
            ];
        }
        else
        {
            return [
                'first_name' => 'required|max:64',
            ];
        }

    }
}
