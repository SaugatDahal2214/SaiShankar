<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Slider;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function display()
    {
        $sliders = Slider::first();
        $services = Service::all();
        // $settings = SiteSetting::first(); // Fetch the first slider
        return view('users.home', compact('sliders', 'services'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Page_Title' => 'required|string',
            'Sub_Description' => 'required|string',
            'Hero_Image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->hasFile('Hero_Image')) {
            $file = $request->file('Hero_Image');
            $fileName = time() . '_Hero_Image.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            $validated['Hero_Image'] = 'images/' . $fileName;
        }

        Slider::create($validated);

        return redirect()->route('sliders.index')->with('success', 'Slider Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $validated = $request->validate([
            'Page_Title' => 'required|string',
            'Sub_Description' => 'required|string',
            'Hero_Image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->hasFile('Hero_Image')) {
            $file = $request->file('Hero_Image');
            $fileName = time() . '_Hero_Image.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            if (file_exists(public_path($slider->Hero_Image))) {
                unlink(public_path($slider->Hero_Image));
            }

            $validated['Hero_Image'] = 'images/' . $fileName;
        } else {
            $validated['Hero_Image'] = $slider->Hero_Image;
        }

        $slider->update($validated);

        return redirect()->route('sliders.index')->with('success', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        if (file_exists(public_path($slider->Hero_Image))) {
            unlink(public_path($slider->Hero_Image));
        }

        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'Slider Removed Successfully');
    }
}
