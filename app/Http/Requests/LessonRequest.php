<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LessonRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', Rule::unique(table:'lessons', column: 'name')->ignore(id: request('lesson'), idColumn:'id')],
            'description' => ['required', 'string', 'max:100', Rule::unique(table:'lessons', column: 'description')->ignore(id: request('lesson'), idColumn:'id')],
            'content_uri' => ['required', 'string', 'max:255', Rule::unique(table:'lessons', column: 'content_uri')->ignore(id: request('lesson'), idColumn:'id')],
            'pdf_uri'=>['required', 'string', 'max:255', Rule::unique(table:'lessons', column: 'pdf_uri')->ignore(id: request('lesson'), idColumn:'id')],
        ];
    }

    public function messages():array
    {
        return [
            'name.unique'=>('The category already exists.')
        ];
    }
}
