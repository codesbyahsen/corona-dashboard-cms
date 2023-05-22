<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironmentSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'app_debug',
        'app_mode',
        'app_url',
        'db_connection',
        'db_host',
        'db_port',
        'db_database',
        'db_username',
        'db_password'
    ];
}
