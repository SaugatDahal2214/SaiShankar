<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Service_Title' => 'required|string|max:255',
            'Service_Description' => 'required|string',
            'Service_Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('Service_Image')) {
            $file = $request->file('Service_Image');
            $fileName = time() . '_Service_Image.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            $validated['Service_Image'] = 'images/' . $fileName;
        }

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'Service_Title' => 'required|string|max:255',
            'Service_Description' => 'required|string',
            'Service_Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('Service_Image')) {
            $file = $request->file('Service_Image');
            $fileName = time() . '_Service_Image.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            // Remove the old image if it exists
            if (file_exists(public_path($service->Service_Image))) {
                unlink(public_path($service->Service_Image));
            }

            $validated['Service_Image'] = 'images/' . $fileName;
        } else {
            $validated['Service_Image'] = $service->Service_Image;
        }

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        // Remove the image if it exists
        if (file_exists(public_path($service->Service_Image))) {
            unlink(public_path($service->Service_Image));
        }

        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
