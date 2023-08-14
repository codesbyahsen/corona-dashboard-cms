<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialLink extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link', 'is_active'];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;


    public function name(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucfirst($value)
        );
    }

    public function link(): Attribute
    {
        return new Attribute(
            set: fn ($value) => str_contains($value, 'http') ? $value : 'https://' . $value
        );
    }
}
