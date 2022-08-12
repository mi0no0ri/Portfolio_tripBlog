<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'username' => 'required|max:20',
            'kana' => 'required|max:40',
            'email' => 'required|max:40',
            'password' => 'nullable|max:20|alpha_num',
            'bio' => 'max:200',
        ];
    }
    public function message()
    {
        return [
            'username.required' => '必須項目です',
            'username.max' => '最大20文字で入力してください。',
            'kana.required' => '必須項目です',
            'kana.max' => '最大40文字で入力してください。',
            'email.required' => '必須項目です',
            'email.max' => '最大40文字で入力してください。',
            'password.max' => '最大40文字で入力してください。',
            'password.alpha_num' => 'アルファベットと数字で入力してください。',
            'bio.required' => '必須項目です',
            'bio.max' => '最大200文字で入力してください。',
            'image.image' => '指定されたファイルが画像ではありません。',
            'image.mimes' => '指定された拡張子（JPG、PNG、BMP、GIF、SVG）ではありません。',
        ];
    }
}
