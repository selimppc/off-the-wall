<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BlogItemRequest extends Request
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
            'slug' => 'required',
            'blog_cat_id' => 'required',
            'desc' => 'required',
            'status' => 'required'
        ];
    }
}
