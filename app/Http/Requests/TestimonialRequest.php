<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TestimonialRequest extends Request
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
            'name' => 'required|max:64',
            'email' => 'required|max:64',
            'phone' => 'required|max:16',
            'project' => 'required|max:128',
            'status' => 'required',
        ];
    }
}
