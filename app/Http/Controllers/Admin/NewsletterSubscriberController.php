<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterSubscriber\StoreRequest;
use App\Services\NewsletterSubscriberService;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    public function __construct(private NewsletterSubscriberService $newsletterSubscriberService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = $this->newsletterSubscriberService->getAll();
        return view('admin.modules.newsletter.index', compact('subscribers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $result = $this->newsletterSubscriberService->create($request->validated());
        if (!$result) {
            return back()->with('error', 'Failed subscribe, try again.');
        }
        return back()->with('success', 'You have successfully subscribed.');
    }

    /**
     * Update the specified status in storage
     */
    public function updateStatus(Request $request, $id)
    {
        $result = $this->newsletterSubscriberService->updateStatus($id, $request->status);

        if (!$result) {
            return back()->with('error', 'Failed to update subscriber status, try again!');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->newsletterSubscriberService->destroy($id);
        if (!$result) {
            return back()->with('error', 'Failed subscribe, try again.');
        }
        return back()->with('success', 'You have successfully unsubscribed.');
    }
}
