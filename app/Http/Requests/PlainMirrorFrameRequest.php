<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PlainMirrorFrameRequest extends Request{

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
            'frame_code' => 'required|unique:plain_mirror_frame,id,' . $this->get('id'),
            'frame_rate' => 'required',
            'frame_code' => 'required',
            'frame_rebate' => 'required',
            'frame_width' => 'required',
            'frame_height' => 'required',
            'frame_min_width' => 'required',
            'frame_max_width' => 'required',
            'sort_order' => 'required',
            'status' => 'required'
        ];
    }

}