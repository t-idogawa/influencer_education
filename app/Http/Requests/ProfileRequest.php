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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required | max:255',
            'name_kana' => 'required | max:255 | kana',
            'email' => 'required | max:255 | email',
        ];
    }

    /**
     * 項目名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'ユーザーネーム',
            'name_kana' => 'カナ',
            'email' => 'メールアドレス',
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'name.required' => ':attributeは入力必須項目です',
            'name.max' => ':attributeは:max文字未満で入力してください',
            'name_kana.required' => ':attributeは入力必須項目です',
            'name_kana.max' => ':attributeは:max文字未満で入力してください',
            'name_kana.kana' => ':attributeはカタカナで入力してください',
            'email.required' => ':attributeは入力必須項目です',
            'email.max' => ':attributeは:max文字未満で入力してください',
            'email.email' => ':attributeはメールアドレス形式で入力してください',
        ];
    }
}
