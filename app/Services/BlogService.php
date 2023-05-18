<?php

namespace App\Services;

use App\Models\Blog;
use App\Actions\ManageFileUpload;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class BlogService
{
    const PATH_BLOG_IMAGE = 'blog/main-image';

    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return Blog::all();
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): Blog
    {
        return Blog::with('blogCategories')->find($id);
    }

    /**
     * Get the specified record's column value
     */
    public function getColumnValue($id, $attribute): mixed
    {
        $rawAttribute = $this->get($id);
        return $rawAttribute->getAttributes()[$attribute];
    }

    /**
     * Store new record in database.
     */
    public function create(array $blog): Blog
    {
        $imageName = null;
        if (isset($blog['image']) && !is_null($blog['image'])) {
            $imageName = ManageFileUpload::handle($blog['image'], self::PATH_BLOG_IMAGE, 'blog');
        }

        // replace image value with custom image name
        $blog = array_replace($blog, array('image' => $imageName));
        $result = Blog::create($blog);

        if ($result && !empty($result)) {
            $this->updateOrStoreCategories($blog['category'], $result->id);
        }
        return $result;
    }

    /**
     * Update or store blog categories in database.
     */
    private function updateOrStoreCategories(array $categories, string $blogId): void
    {
        foreach ($categories as $id) {
            DB::table('category_blog')->updateOrInsert(
                ['blog_id' => $blogId, 'blog_category_id' => $id],
                ['blog_category_id' => $id, 'blog_id' => $blogId, 'created_at' => now(), 'updated_at' => now()]
            );
        }
        DB::table('category_blog')->whereNotIn('blog_category_id', $categories)->where('blog_id', $blogId)->delete();
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $blog): bool
    {
        $imageName = null;
        if (isset($blog['image']) && !is_null($blog['image'])) {
            $imageName = ManageFileUpload::handle($blog['image'], self::PATH_BLOG_IMAGE, 'blog');
        } else {
            $imageName = $this->getColumnValue($id, 'image');
        }

        // replace image value with custom image name
        $blog = array_replace($blog, array('image' => $imageName));

        $result = $this->get($id)->update($blog);

        if ($result && !empty($result)) {
            $this->updateOrStoreCategories($blog['category'], $id);
        }
        return $result;
    }

    /**
     * Update status by id in database.
     */
    public function updateStatus(string $id, $status): bool
    {
        return (bool) Blog::withoutTimestamps(function () use ($id, $status) {
            $this->get($id)->update(['is_active' => $status]);
        });
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): bool
    {
        return $this->get($id)->delete();
    }
}
