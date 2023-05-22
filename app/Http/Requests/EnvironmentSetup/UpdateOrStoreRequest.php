<?php

namespace App\Http\Requests\EnvironmentSetup;

use Illuminate\Foundation\Http\FormRequest;

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
            'app_name' => ['nullable', 'max:60'],
            'app_debug' => ['nullable', 'in:0,1'],
            'app_mode' => ['nullable'],
            'app_url' => ['nullable'],
            'db_connection' => ['nullable', 'max:18'],
            'db_host' => ['nullable'],
            'db_port' => ['nullable', 'max:10'],
            'db_database' => ['nullable', 'max:120'],
            'db_username' => ['nullable', 'max:120'],
            'db_password' => ['nullable', 'min:8']
        ];
    }
}
