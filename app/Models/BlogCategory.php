<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->find($id);
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
}
