<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PasswordRule;

class PasswordRequest extends FormRequest
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
            'password_old' => [ new PasswordRule() ],
            'password' => 'required | min:8 | max:255 | confirmed',
            'password_confirmation' => 'required',
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
            'password_old' => '旧パスワード',
            'password' => '新パスワード',
            'password_confirmation' => '確認用の新パスワード',
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'password.required' => ':attributeは入力必須項目です',
            'password.min' => ':attributeは:min文字以上で入力してください',
            'password.max' => ':attributeは:max文字未満で入力してください',
            'password.confirmed' => '新しいパスワードが異なります',
            'password_confirmation.required' => ':attributeは入力必須項目です',
        ];
    }
}
