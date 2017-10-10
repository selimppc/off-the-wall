<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MatRequest extends Request
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
            'color' => 'required|unique:mat,id,' . $this->get('id'),
            'name' => 'required',
            'code' => 'required',
            'status' => 'required'
        ];
    }


}