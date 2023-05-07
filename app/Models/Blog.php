<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'heading',
        'title',
        'sub_title',
        'quote',
        'description',
        'is_active'
    ];

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;


    // ==============================| Relations |============================== //

    public function blogCategories(): BelongsToMany
    {
        return $this->belongsToMany(BlogCategory::class, 'category_blog');
    }
}
