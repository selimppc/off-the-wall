<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GlassBackingRequest extends Request
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
            'title' => 'required|unique:glass_backing,id,' . $this->get('id'),
            'type' => 'required',
            'status' => 'required'
        ];
    }
}