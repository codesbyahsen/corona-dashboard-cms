<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'is_active'];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;


    public function slug(): Attribute
    {
        return new Attribute(set: fn ($value) => Str::slug($value));
    }
}
