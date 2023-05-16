<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
