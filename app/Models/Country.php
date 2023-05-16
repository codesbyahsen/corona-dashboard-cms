<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'official_name',
        'iso_alpha_2',
        'iso_alpha_3',
        'international_phone'
    ];
}
