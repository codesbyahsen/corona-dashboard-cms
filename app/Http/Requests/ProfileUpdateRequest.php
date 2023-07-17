<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:155'],
            'middle_name' => ['nullable', 'string', 'max:155'],
            'last_name' => ['required', 'string', 'max:155'],
            'email' => ['required', 'email:strict', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'gender' => ['required', 'string', 'max:10', 'in:Male,Female,Other'],
            'phone' => ['nullable', 'string', 'max:12']
        ];
    }
}
