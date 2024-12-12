<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    public function display()
    {
        $teams = Team::all();
        return view('users.about', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'Team_Image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'Team_Description' => 'required|string',
            'Md_Image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'ManagingDirector_Message' => 'required|string'
        ]);

        // Handle Team Image
        if ($request->hasFile('Team_Image')) {
            $file = $request->file('Team_Image');
            $fileName = time() . '_Team_Image.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $validate['Team_Image'] = 'images/' . $fileName;
        }

        // Handle Managing Director Image
        if ($request->hasFile('Md_Image')) {
            $file = $request->file('Md_Image');
            $fileName = time() . '_Md_Image.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $validate['Md_Image'] = 'images/' . $fileName;
        }

        Team::create($validate);

        return redirect()->route('teams.index')->with('success', 'Team Created Successfully');
    }

    public function edit(string $id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', compact('team')); // Use singular 'team'
    }

    public function update(Request $request, string $id)
    {
        $team = Team::findOrFail($id);

        $validate = $request->validate([
            'Team_Image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'Team_Description' => 'required|string',
            'Md_Image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'ManagingDirector_Message' => 'required|string'
        ]);

        // Handle Team Image
        if ($request->hasFile('Team_Image')) {
            $file = $request->file('Team_Image');
            $fileName = time() . '_Team_Image.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            if (file_exists(public_path($team->Team_Image))) {
                unlink(public_path($team->Team_Image));
            }

            $validate['Team_Image'] = 'images/' . $fileName;
        } else {
            $validate['Team_Image'] = $team->Team_Image;
        }

        // Handle Managing Director Image
        if ($request->hasFile('Md_Image')) {
            $file = $request->file('Md_Image');
            $fileName = time() . '_Md_Image.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);

            if (file_exists(public_path($team->Md_Image))) {
                unlink(public_path($team->Md_Image));
            }

            $validate['Md_Image'] = 'images/' . $fileName;
        } else {
            $validate['Md_Image'] = $team->Md_Image;
        }

        $team->update($validate);

        return redirect()->route('teams.index')->with('success', 'Team Updated Successfully');
    }

    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);

        if (file_exists(public_path($team->Team_Image))) {
            unlink(public_path($team->Team_Image));
        }

        if (file_exists(public_path($team->Md_Image))) {
            unlink(public_path($team->Md_Image));
        }

        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team Deleted Successfully');
    }
}
