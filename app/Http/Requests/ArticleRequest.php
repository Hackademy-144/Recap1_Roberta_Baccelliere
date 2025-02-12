<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required', 'min:5', 'max:50',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute is required',
            'min' => 'The :attribute is too short',
            'max' => 'The :attribute is too long',
        ];
    }
}
