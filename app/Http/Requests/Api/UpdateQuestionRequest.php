<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateQuestionRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:questions,slug,' . $this->route('question')->id,
            'description' => 'nullable|string|max:5000',
            'options' => 'required|array',
            'answer' => 'required|string|in:' . implode(',', $this->input('options', [])),
            'weightage' => 'required|integer|min:10|max:20',
            'status' => 'nullable|boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'answer.in' => "Answer must be one from the options",
        ];

    }

}












