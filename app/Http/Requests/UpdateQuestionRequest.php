<?php

namespace App\Http\Requests;

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
            'title' => "string|required|max:255",
            'slug' => "string|required|max:255|unique:questions,slug,{$this->route('question')->id}",
            'description' => "string|nullable|max:5000",
            'options' => "array|required",
            'answer' => ['required', function ($attribute, $value, $fail) {
                $options = $this->input('options', []);
                if (!in_array($value, $options)) {
                    $fail($attribute . ' is not one of the valid options.');
                }
            }],
            "weightage" => "integer|required|min:10",
            "status" => "boolean|nullable"
        ];
    }
    
}
