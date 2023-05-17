<?php

namespace App\Http\Requests\GeneralSetup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UpdateOrStoreRequest extends FormRequest
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
            'logo' => ['required', File::types(['png', 'jpg', 'jpeg'])->max(1024 * 2)],
            'favicon' => ['required', File::types(['png', 'jpg', 'jpeg'])->max(512)],
            'name' => ['required', 'max:120'],
            'tagline' => ['nullable'],
            'phone' => ['required', 'max:20'],
            'mobile' => ['nullable', 'max:20'],
            'email' => ['nullable', 'email'],
            'street_address' => ['nullable', 'max:220'],
            'city' => ['nullable', 'max:50'],
            'state' => ['nullable', 'max:50'],
            'country' => ['nullable'],
            'latitude' => ['nullable'],
            'longitude' => ['nullable'],
            'timezone' => ['nullable'],
            'primary_color' => ['nullable', 'max:7'],
            'secondary_color' => ['nullable', 'max:7']
        ];
    }
}
