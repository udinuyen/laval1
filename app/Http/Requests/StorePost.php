<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
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
            'title' => 'required|max:100',
            'body' => 'required|min:50'
        ];        
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề bài viết không được bỏ trống',
            'body.required' => 'Nội dung bài viết không được bỏ trống'
        ];
    }
    
    
}
