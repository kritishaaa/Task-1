<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $QuestionId = $this->route('question')->id ?? null;
        return [
            'title' =>'required|string|max:50',
            'description' => 'required|string',
            'slug'=> 'required|string|unique:questions,slug,' . $QuestionId,
            'options' => 'required|array|max:3',
            'answer' =>'required|integer|between:0,4',
            'weightage' => 'required|integer|min:11|max:19'
        ];
    }
}
