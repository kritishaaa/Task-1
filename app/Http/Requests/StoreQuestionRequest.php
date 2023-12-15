<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreQuestionRequest extends FormRequest
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
            'title' => "string|required|max:255",
            'slug' => "nullable|max:255|unique:questions",
            'description' => "string|nullable|max:5000",
            'options' => "array|required",
            'answer' => 'required|string|in:' . implode(',', $this->input('options', [])),
            "weightage" => "required|integer|min:10",
            "status" => "boolean|nullable"
        ];
    }
    public function messages(): array
    {
        return [
            'answer.in' => "Answer must be one from the options",

        ];

    }
}