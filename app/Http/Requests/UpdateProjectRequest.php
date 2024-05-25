<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:100', Rule::unique('projects')->ignore($this->project->id)],
            'project_image' => 'nullable|image|max:500',
            /* 'tools' => 'nullable', */
            'preview' => 'nullable',
            'project_link' => 'required',
            'github_link' => 'required',
            'creation_date' => 'nullable',
            'description' => 'nullable',
            'type_id' => 'nullable|exists:types,id'
        ];
    }
}
