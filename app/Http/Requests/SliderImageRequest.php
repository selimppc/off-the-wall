<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SliderImageRequest extends Request
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
            'cat_slider_id' => 'required|max:11',
            'name' => 'required|max:64',
//            'url' => 'required|max:128',
            'status' => 'required'
        ];
    }
}
