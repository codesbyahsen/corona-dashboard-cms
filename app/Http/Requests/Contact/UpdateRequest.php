<?php

namespace App\Http\Requests\Contact;

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
            'title' => ['required'],
            'email' => ['required'],
            'phone' => ['nullable'],
            'mobile' => ['nullable', 'unique:contacts,mobile,' . decrypt($this->id)],
            'address_line_one' => ['nullable'],
            'address_line_two' => ['nullable'],
            'city' => ['nullable'],
            'state' => ['nullable'],
            'country' => ['nullable'],
            'post_code' => ['nullable'],
            'map' => ['nullable'],
            'type' => ['required']
        ];
    }
}
