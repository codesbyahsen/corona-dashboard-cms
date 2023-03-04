<?php

namespace App\Http\Requests\Blog;

use Illuminate\Validation\Rules\File;
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
            'image' => ['required', File::types(['png', 'jpg', 'jpeg'])->max(1024)],
            'heading' => ['required', 'min:3'],
            'title' => ['required', 'unique:blogs,title,' . decrypt($this->id)],
            'sub_title' => ['nullable'],
            'category' => ['required', 'distinct'],
            'quote' => ['nullable', 'max:220'],
            'description' => ['required', 'max:10000'],
        ];
    }
}
