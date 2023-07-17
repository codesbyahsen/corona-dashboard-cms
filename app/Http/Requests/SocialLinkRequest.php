<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
                    'name' => ['required', 'unique:social_links,name'],
                    'link' => ['required', 'unique:social_links,link']
                ];
            case 'PUT':
                return [
                    'name' => ['required', 'unique:social_links,name,' . $this->id],
                    'link' => ['required', 'unique:social_links,link,' . $this->id]
                ];
        }
    }
}
