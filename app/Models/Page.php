<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'description', 'is_active'];

    const STATUS_ACTIVE = true;
    const STATUS_INACTIVE = false;
    const TYPE_TERMS_AND_CONDITIONS = 'terms-and-conditions';
    const TYPE_PRIVACY_POLICIES = 'privacy-policies';
}
