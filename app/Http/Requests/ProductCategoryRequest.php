<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductCategoryRequest extends Request
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
            'title' => 'required|max:256',
            'slug' => 'required',
            'status' => 'required',
            'group_id' => 'required|integer'
        ];
    }
}