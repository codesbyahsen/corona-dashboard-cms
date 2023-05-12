<?php

namespace App\Http\Requests\MailConfiguration;

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
            'transport' => ['required', 'max:50'],
            'host' => ['required', 'max:100', 'unique:mail_configurations,host,' . $this->id],
            'port' => ['required', 'max:6'],
            'encryption' => ['required', 'max:50'],
            'username' => ['required', 'max:20'],
            'password' => ['required', 'min:8'],
            'from_address' => ['nullable', 'email'],
            'from_name' => ['nullable', 'string', 'max:30']
        ];
    }

    public function messages()
    {
        return [
            'transport.required' => __('The mail transport field is required.'),
            'transport.max' => __('The mail transport must not be greater than :max characters.'),

            'host.required' => __('The mail host field is required.'),
            'host.max' => __('The mail host must not be greater than :max characters.'),
            'host.unique' => __('The mail host has already been taken.'),

            'port.required' => __('The mail port field is required.'),
            'port.max' => __('The mail port must not be greater than :max characters.'),

            'encryption.required' => __('The mail encryption field is required.'),
            'encryption.max' => __('The mail encryption must not be greater than :max characters.'),

            'username.required' => __('The mail username field is required.'),
            'username.max' => __('The mail username must not be greater than :max characters.'),

            'password.required' => __('The mail password field is required.'),
            'password.min' => __('The mail password must be at least :min characters.'),

            'from_address.email' => __('The mail from must be a valid email address.'),
            'from_name.max' => __('The mail from name must not be greater than :max characters.')
        ];
    }
}
