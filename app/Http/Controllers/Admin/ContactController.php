<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Http\Requests\Contact\UpdateRequest;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(private ContactService $contactService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = $this->contactService->getAll();
        return view('admin.modules.contacts.index', compact('contacts'));
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
        $result = $this->contactService->create($request->validated());

        if (!$result) {
            return back()->with('error', 'Failed to create contact, try again!');
        }
        return redirect()->route('admin.contacts')->with('success', 'The contact created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = decrypt($id);
        $contact = $this->contactService->get($id);
        return view('admin.modules.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = decrypt($id);
        $contact = $this->contactService->get($id);
        return view('admin.modules.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        $result = $this->contactService->update($id, $request->validated());

        if (!$result) {
            return back()->with('error', 'Failed to update contact, try again!');
        }
        return redirect()->route('admin.contacts')->with('success', 'The contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = $this->contactService->destroy($id);

        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'The contact deleted successfully'], 200);
    }
}
