<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftEditRequest extends FormRequest
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
            'name'=>'required',
            'contents_parent'=>'required',
            'level_id'=>'required|min:1',
        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required' => 'Tên không được bỏ trống',
//            'name.unique' => 'Tên đã tồn tại',
//            'name.max' => 'Tên tối đã 255',
//            'name.min' => 'Tên tối thiểu 10',
//            'decription.required' => 'Mô tả không được bỏ trống',
//            'image_path.required' => 'Ảnh không được bỏ trống',
//        ];
//    }
}
