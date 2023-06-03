<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\ScreenshotService;
use Spatie\Browsershot\Browsershot;
use App\Http\Controllers\Controller;
use App\Http\Requests\Screenshot\StoreRequest;

class ScreenshotController extends Controller
{
    public function __construct(private ScreenshotService $screenshotService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // $result = Browsershot::url(route('admin.dashboard'))
            // ->setNodeBinary('/usr/local/bin/node')
            // ->setNpmBinary('/usr/local/bin/npm')
            // ->setOption('landscape', true)
            // ->windowSize(1366, 768)
            // ->fullPage()
            // ->waitUntilNetworkIdle()
            // ->timeout(200)
            // ->save('screenshot.png');
        // dd($result);

        $result = $this->screenshotService->create($request->validated());

        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'Screenshot taken successfully.', 'result' => $result], 200);

        // if (!$result) {
        //     return back()->with('error', 'Failed to take screenshot, try again.');
        // }
        // return redirect()->route('admin.screenshots')->with('success', 'Screenshot taken successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->screenshotService->destroy($id);
        if (!$result) {
            return response()->json(['success' => false, 'message' => 'Something went wrong, try again!']);
        }
        return response()->json(['success' => true, 'message' => 'Faq deleted successfully.'], 200);
    }
}
