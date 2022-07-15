<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'required|max:50',
            'name' => 'required|max:10',
            'email' => 'max:30'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須です。',
            'comment.required' => 'コメントは必須です。',
            'comment.max' => '最大50文字で入力してくだいさい。',
            'name.required' => 'お名前は必須です。',
            'name.max' => '最大10文字で入力してください。',
            'email.max' => '最大30文字で入力してください。'
        ];
    }
}
