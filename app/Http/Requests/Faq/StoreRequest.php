<?php

namespace App\Http\Requests\Faq;

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
            'faq_category_id' => ['required'],
            'question' => ['required', 'max:650', 'unique:faqs,question'],
            'answer' => ['required', 'max:3000']
        ];
    }

    public function messages()
    {
        return [
            'faq_category_id.required' => __('The faq category field is required.')
        ];
    }
}
