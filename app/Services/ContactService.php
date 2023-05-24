<?php

namespace App\Services;

use App\Models\Contact;
use App\Actions\ManageFileUpload;
use Illuminate\Database\Eloquent\Collection;

class ContactService
{
    const PATH_AVATAR = 'contacts';

    /**
     * Get all record from database.
     */
    public function getAll(): Collection
    {
        return Contact::all();
    }

    /**
     * Get record by id from database.
     */
    public function get(string $id): Contact
    {
        return Contact::find($id);
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
    public function create(array $contact): Contact
    {
        $avatarName = null;
        if (isset($contact['avatar']) && !is_null($contact['avatar'])) {
            $avatarName = ManageFileUpload::handle($contact['avatar'], self::PATH_AVATAR, 'avatar');
        }

        // replace avatar value with custom avatar name
        $contact = array_replace($contact, array('avatar' => $avatarName));
        return Contact::create($contact);
    }

    /**
     * Update record by id in database.
     */
    public function update(string $id, array $contact): bool
    {
        $avatarName = null;
        if (isset($contact['avatar']) && !is_null($contact['avatar'])) {
            $avatarName = ManageFileUpload::handle($contact['avatar'], self::PATH_AVATAR, 'avatar');
        } else {
            $avatarName =  $this->getColumnValue($id, 'avatar');
        }

        // replace avatar value with custom avatar name
        $contact = array_replace($contact, array('avatar' => $avatarName));

        return $this->get($id)->update($contact);
    }

    /**
     * Delete record by id from database.
     */
    public function destroy(string $id): bool
    {
        return $this->get($id)->delete();
    }
}
