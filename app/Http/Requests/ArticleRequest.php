<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'posted_date' => 'required | date',
            'title' => 'required | max:255',
            'article_contents' => 'required',
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
            'posted_date' => '投稿日時',
            'title' => 'タイトル',
            'article_contents' => '本文',
        ];
    }

    /**
     * エラーメッセージ
     *
     * @return array
     */
    public function messages() {
        return [
            'posted_date.required' => ':attributeは入力必須項目です',
            'posted_date.date' => ':attributeは日付の形式で入力してください',
            'title.required' => ':attributeは入力必須項目です',
            'title.max' => ':attributeは:max文字未満で入力してください',
            'article_contents.required' => ':attributeは入力必須項目です',
        ];
    }
}
