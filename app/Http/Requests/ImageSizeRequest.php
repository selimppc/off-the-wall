<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImageSizeRequest extends Request
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
            'title' => 'required',
            'value' => 'required',
            'width_cm' => 'required',
            'height_cm' => 'required',
            'width_inch' => 'required',
            'height_inch' => 'required',
            'sort_order' => 'required'
        ];
    }
}