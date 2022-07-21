<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
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
            'list' => 'max:100|required'
        ];
    }
    public function messages()
    {
        return [
            'list.max' => '100文字以内で入力してください。',
            'list.required' => '入力してください。'
        ];
    }
}
