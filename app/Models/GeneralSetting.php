<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GeneralSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'logo',
        'favicon',
        'name',
        'tagline',
        'phone',
        'mobile',
        'email',
        'street_address',
        'city',
        'state',
        'country',
        'latitude',
        'longitude',
        'timezone',
        'primary_color',
        'secondary_color'
    ];

    public function logo(): Attribute
    {
        return new Attribute(
            get: fn ($value) => isset($value) && !empty($value) ? asset('uploads/general-settings/' . $value) : null
        );
    }

    public function favicon(): Attribute
    {
        return new Attribute(
            get: fn ($value) => isset($value) && !empty($value) ? asset('uploads/general-settings/' . $value) : null
        );
    }
}
