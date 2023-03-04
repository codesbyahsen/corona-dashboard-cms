<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * Get the collection of data
     */
    public function getAll(): Collection
    {
        return $this->all();
    }

    /**
     * Get the specified record
     *
     * @param int  $id
     */
    public function get($id)
    {
        return $this->where('id', $id)->with('blogCategories')->first();
    }

    /**
     * Get the specified column value
     *
     * @param int  $id
     * @param string  $attribute
     * @return string
     */
    public function getColumnValue($id, $attribute): string
    {
        return $this->where('id', $id)->value($attribute);
    }


    // ==============================| Relations |============================== //

    public function blogCategories(): BelongsToMany
    {
        return $this->belongsToMany(BlogCategory::class, 'category_blog');
    }
}
