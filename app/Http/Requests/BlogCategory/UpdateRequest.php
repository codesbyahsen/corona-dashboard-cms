<?php

namespace App\Http\Requests\BlogCategory;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'unique:blog_categories,name,'. decrypt($this->id), 'max:50']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The category name field is required.',
            'name.unique' => 'The category name has already been taken.',
            'name.max' => 'The category name must not be greater than 50 characters.'
        ];
    }
}
