<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'email',
        'phone',
        'mobile',
        'address_line_one',
        'address_line_two',
        'city',
        'state',
        'country',
        'post_code',
        'map',
        'type',
        'is_active'
    ];

    const STATUS_ACTIVE = true;
    const STATUS_INACTIVE = false;
    const TYPE_HEAD_OFFICE = 'head office';
    const TYPE_SUB_OFFICE = 'sub office';

    /**
     * Get the collection of contact
     */
    public function getAllContacts(): Collection
    {
        return $this->all();
    }

    /**
     * Get head office contact
     */
    public function getHeadOffice()
    {
        return $this->where('type', self::TYPE_HEAD_OFFICE)->first();
    }

    /**
     * Get the specified contact record
     */
    public function getContact($id)
    {
        return $this->find($id);
    }

    /**
     * Get the specified contact column value
     */
    public function getContactColumnValue($id, $attribute): string
    {
        return $this->where('id', $id)->value($attribute);
    }

    /**
     * Store contact in storage.
     */
    public function createContact(array $contactDetails)
    {
        return $this->create($contactDetails);
    }

    /**
     * Update specified contact in storage.
     */
    public function updateContact($id, array $contactDetails)
    {
        return $this->find($id)->update($contactDetails);
    }

    /**
     * Destroy specified contact from storage.
     */
    public function destroyContact($id)
    {
        return $this->find($id)->delete();
    }
}
