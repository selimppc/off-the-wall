<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FrameCategoryRequest extends Request{

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
            'slug' => 'required|unique:frame_category,id,' . $this->get('id'),
            'sort_order' => 'required',
            'status' => 'required'
        ];
    }
}