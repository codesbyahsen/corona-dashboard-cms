<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'name',
        'email',
        'phone',
        'mobile',
        'address_line_one',
        'address_line_two',
        'city',
        'state',
        'country',
        'post_code',
        'birthday',
        'website',
        'note'
    ];

    const STATUS_ACTIVE = true;
    const STATUS_INACTIVE = false;

    public function getFullAddress()
    {
        return ($this->address_line_one ? $this->address_line_one . ', ' : '') . ($this->address_line_two ? $this->address_line_two . ', ' : '' ) . ($this->city ? $this->city . ', ' : '') . ($this->state ? $this->state . ', ' : '') . ($this->country ? $this->country . ', ' : '') . ($this->post_code ?? '') . '.';
    }
}
