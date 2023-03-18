<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルは必須項目です。',
            'title.max' => 'タイトルは255文字以内です。',
            'body.required' => '本文は必須項目です。',
        ];
    }
}
