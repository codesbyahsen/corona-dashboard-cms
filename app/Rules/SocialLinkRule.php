<?php

namespace App\Rules;

use App\Models\SocialLink;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SocialLinkRule implements ValidationRule
{
    protected $id;

    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $linkWithHttp = str_contains($value, 'http') ? $value : 'https://' . $value;
        if (!is_null($this->id)) {
            $link = (bool) SocialLink::where('id', '!=', $this->id)->where('link', $linkWithHttp)->first();
            ($link == true) ? $fail('The social link has already been taken.') : null;
        } else {
            $link = (bool) SocialLink::where('link', $linkWithHttp)->first();
            ($link == true) ? $fail('The social link has already been taken.') : null;
        }
    }
}
