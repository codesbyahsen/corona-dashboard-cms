<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BlogCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    /**
     * Get the collection of blog categories
     */
    public function getAllBlogCategories(): Collection
    {
        return $this->all();
    }

    /**
     * Get the specified blog category record
     */
    public function getBlogCategory($id)
    {
        return $this->find($id);
    }

    /**
     * Get the specified column value
     */
    public function getBlogCategoryColumnValue($id, $attribute): string
    {
        return $this->where('id', $id)->value($attribute);
    }

    /**
     * Store blog category in storage.
     */
    public function createBlogCategory(array $blogCategoryDetails)
    {
        return $this->create($blogCategoryDetails);
    }

    /**
     * Update specified blog category in storage.
     */
    public function updateBlogCategory($id, array $blogCategoryDetails)
    {
        return $this->find($id)->update($blogCategoryDetails);
    }

    /**
     * Destroy specified blog category from storage.
     */
    public function destroyBlogCategory($id)
    {
        return $this->find($id)->delete();
    }


    // ==============================| Relations |============================== //

    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class, 'category_blog');
    }
}
