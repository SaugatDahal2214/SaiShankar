<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettings extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = SiteSetting::all();
        return view('admin.site_settings.index', compact('settings'));
    }

    public function display()
    {
        $settings = SiteSetting::first();
        return view('users.home', compact('settings'));
    }
    
    



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.site_settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         // Validate the incoming request data
         $validate = $request->validate([
             'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4000', // Validate image file
             'footer' => 'required|string', // Validate footer text
             'Social_link_one' => 'nullable|url', // Validate Social Link 1 (optional URL)
             'Social_link_two' => 'nullable|url', // Validate Social Link 2 (optional URL)
             'Social_link_three' => 'nullable|url', // Validate Social Link 3 (optional URL)
             'social_icon_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        'social_icon_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        'social_icon_three' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
         ]);
     
         // Handle the image upload
         foreach (['logo', 'social_icon_one', 'social_icon_two', 'social_icon_three'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $fileName);
                $validate[$field] = 'images/' . $fileName;
            }
        }
    
        SiteSetting::create($validate);
    
        return redirect()->route('siteSettings.index')->with('success', 'Site Settings Created Successfully');
    }
     
    
    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $settings = SiteSetting::findOrFail($id);
        return view('admin.site_settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $setting = SiteSetting::findOrFail($id);
    
        $validate = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            'footer' => 'required|string',
            'Social_link_one' => 'nullable|url',
            'Social_link_two' => 'nullable|url',
            'Social_link_three' => 'nullable|url',
            'social_icon_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            'social_icon_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
            'social_icon_three' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        ]);
    
        // Handle image uploads
        foreach (['logo', 'social_icon_one', 'social_icon_two', 'social_icon_three'] as $field) {
            if ($request->hasFile($field)) {
                // Delete the old file if exists
                if ($setting->{$field} && file_exists(public_path($setting->{$field}))) {
                    unlink(public_path($setting->{$field}));
                }
    
                $file = $request->file($field);
                $fileName = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images'), $fileName);
                $validate[$field] = 'images/' . $fileName;
            } else {
                $validate[$field] = $setting->{$field};
            }
        }
    
        $setting->update($validate);
    
        return redirect()->route('siteSettings.index')->with('success', 'Site Settings Updated Successfully');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = SiteSetting::findOrFail($id);
        $setting->delete();

        return redirect()->route('siteSettings.index')
            ->with('success', 'Site setting deleted successfully.');
    }
}
