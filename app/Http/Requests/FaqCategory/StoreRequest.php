<?php

namespace App\Http\Requests\FaqCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['required', 'max:125', 'unique:faq_categories,name']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('The category name field is required.'),
            'name.max' => __('The category name must not be greater than :max characters.'),
            'name.unique' => __('The category name has already been taken.')
        ];
    }
}
