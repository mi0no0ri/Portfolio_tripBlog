<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'dest' => 'required|max:15',
            'date' => 'required|max:10',
            'comment' => 'max:15',
        ];
    }
    public function messages()
    {
        return [
            'area_id.required' => 'エリアは必須項目です。',
            'dest.required' => '旅行先は必須項目です。',
            'dest.max' => '最大10文字までで入力してください。',
            'date.required' => '日にちは必須項目です。',
            'date.max' => '最大15文字までで入力してください。',
            'comment.max' => '最大15文字までで入力してください。',
            'image.image' => '指定されたファイルが画像ではありません。',
            'image.mimes' => '指定された拡張子（JPG、PNG、BMP）ではありません。',
            'image.max' => '最大3MBまでで投稿してください。',
        ];
    }

}
