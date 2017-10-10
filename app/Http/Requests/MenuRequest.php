<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MenuRequest extends Request
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
        return [
            'menu_type_id' => 'required|max:64',
            'name' => 'required|max:64',
            'alias' => 'required|max:64',
            'url' => 'required|max:256',
            'type' => 'required',
            'status' => 'required',
            //'parent' => 'required|max:11',
            'ext_name' => 'required',
            //'order' => 'required'
        ];
    }
}
