<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailConfiguration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transport',
        'host',
        'port',
        'encryption',
        'username',
        'password',
        'from_address',
        'from_name',
        'is_active'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public function scopeIsActive($query)
    {
        return $query->where('is_active', self::STATUS_ACTIVE);
    }
}
