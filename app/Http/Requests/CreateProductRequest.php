<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'title' => 'required|max:32',
            'promotion' => 'required|max:128',
            'overview' => 'required|max:256',
            'main_image' => 'required|mimes:jpeg,jpg,bmp,png,gif|max:4096',
            'sub_image1' => 'mimes:jpeg,jpg,bmp,png,gif|max:4096',
            'sub_image2' => 'mimes:jpeg,jpg,bmp,png,gif|max:4096',
            'sub_image3' => 'mimes:jpeg,jpg,bmp,png,gif|max:4096',
            'price' => 'required|integer|digits_between:0,32',
            'category_id' => 'required|integer',
            'status_id' => 'required|integer',
        ];
       
    }

    public function messages()
    {
        return [
            'price.digits_between' => '値段は32桁以内で入力してください',
            'category_id.require' => '選択必須項目です。',
            'category_id.integer' => '選択項目から選んでください。',
            'status_id.require' => '選択必須項目です。',
            'status_id.integer' => '選択項目から選んでください。',
        ];
    }
}
