<?php

namespace App\Http\Requests\admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=>'required|max:100|min:5',
        ];
        
    }
    public function messages() {
        return [
            'name.max' => 'Tên danh mục không quá 100 ký tự',
            'name.min' => 'Tên danh mục phải nhiều hơn 5 ký tự',
            'name.required' => 'Tên danh mục không được để trống',
        ];
    }
}
