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
     * Get the collection of blogs
     */
    public function getAllBlogs(): Collection
    {
        return $this->all();
    }

    /**
     * Get the specified blog record
     */
    public function getBlog($id)
    {
        return $this->find($id);
    }

    /**
     * Get the specified blog column value
     */
    public function getBlogColumnValue($id, $attribute): string
    {
        return $this->where('id', $id)->value($attribute);
    }

    /**
     * Store blog in storage.
     */
    public function createBlog(array $blogDetails)
    {
        return $this->create($blogDetails);
    }

    /**
     * Update specified blog in storage.
     */
    public function updateBlog($id, array $blogDetails)
    {
        return $this->find($id)->update($blogDetails);
    }

    /**
     * Update specified blog in storage.
     */
    public function updateBlogStatus($id, array $blogStatus)
    {
        return $this->find($id)->update($blogStatus);
    }

    /**
     * Destroy specified blog from storage.
     */
    public function destroyBlog($id)
    {
        return $this->find($id)->delete();
    }


    // ==============================| Relations |============================== //

    public function blogCategories(): BelongsToMany
    {
        return $this->belongsToMany(BlogCategory::class, 'category_blog');
    }
}
