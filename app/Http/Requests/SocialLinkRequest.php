<?php

namespace App\Http\Requests;

use App\Rules\SocialLinkRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class SocialLinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        switch ($this->getMethod()) {
            case 'POST':
                return [
                    'name' => ['required', 'max:255'],
                    'link' => ['required', new SocialLinkRule]
                ];
            case 'PUT':
                return [
                    'name' => ['required', 'max:255'],
                    'link' => ['required', new SocialLinkRule($this->social_link)]
                ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'The social :attribute is required.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => $validator->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
