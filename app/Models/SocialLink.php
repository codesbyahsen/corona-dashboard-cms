<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'link', 'is_active'];

    const STATUS_ACTIVE = true;
    const STATUS_INACTIVE = false;


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
