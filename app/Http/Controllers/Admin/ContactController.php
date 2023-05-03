<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\Contact\UpdateRequest;

class ContactController extends Controller
{
    public Contact $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headOffice = $this->contact->getHeadOffice();
        $contacts = $this->contact->getAllContacts();
        return view('admin.modules.contacts.index', compact('contacts', 'headOffice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.modules.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $result = $this->contact->createContact($request->validated());

        if (!$result) {
            return back()->with('error', 'Something went wrong, try again!');
        }
        return redirect()->route('contacts')->with('success', 'The contact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = decrypt($id);
        $contact = $this->contact->getContact($id);
        return view('admin.modules.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = decrypt($id);
        $contact = $this->contact->getContact($id);
        return view('admin.modules.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $id = decrypt($id);
        $result = $this->contact->updateContact($id, $request->validated());

        if (!$result) {
            return back()->with('error', 'Something went wrong, try again!');
        }
        return redirect()->route('contacts')->with('success', 'The contact updated successfully.');
    }

    /**
     * Update the specified status in storage
     */
    public function updateStatus($id)
    {
        $id = decrypt($id);
        $contact = $this->contact->getContact($id);
        $status = ($contact->is_active == Contact::STATUS_ACTIVE ? Contact::STATUS_INACTIVE : Contact::STATUS_ACTIVE);
        $contactStatus = array('is_active' => $status);
        $result = $this->contact->updateContact($id, $contactStatus);

        if (!isset($result)) {
            return back()->with('error', 'Something went wrong, try again!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = decrypt($id);
        $result = $this->contact->destroyContact($id);

        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'The contact deleted successfully'], 200);
    }
}
