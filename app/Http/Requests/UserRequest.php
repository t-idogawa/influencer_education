<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'name_kana' => 'required|string|katakana|max:255', //AppServiceProviderにカタカナ入力のルール追加し引用
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'classes_id' => 'min:0'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => '氏名は必ず入力して下さい。',
            'name,max' => '氏名は255文字以内で入力して下さい。',
            'name_kana.required' => 'カナは必ず入力して下さい。',
            'name_kana.katakana' => 'カナはカタカナで入力して下さい。',
            'name_kana.max' => 'カナは255文字以内で入力して下さい。',
            'email.required' => 'メールアドレスは必ず入力して下さい。',
            'email.max' => 'メールアドレスは255文字以内で入力して下さい。',
            'password.min' =>'パスワードは8文字以上で入力して下さい。',
            'profile_image.mimes' => '画像ファイルはjpeg,png,jpg形式のみ対応しています。',
            'profile_image.max' => 'ファイルサイズは2MB以内にしてください。'
        ];
    }
}
