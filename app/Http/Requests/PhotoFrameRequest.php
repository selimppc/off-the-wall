<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PhotoFrameRequest extends Request{

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
            'frame_category_id' => 'required',
            'frame_code' => 'required|unique:photo_frame,id,' . $this->get('id'),
            'frame_width' => 'required',
            'frame_depth' => 'required',
            'frame_rebate' => 'required',
            'frame_rate' => 'required',
            'frame_min' => 'required',
            'frame_max' => 'required',
            'sort_order' => 'required',
            'status' => 'required'
        ];
    }

}