<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'title' =>'required|string|max:30',
            'description' => 'required|string',
            'slug'=> 'required|string|unique:questions', 
            'options' => 'string',
            'answer' =>'required|interger|between:0,4',
            'weightage' => 'required|interger|min:11|max:19'
        ];
    }
}
