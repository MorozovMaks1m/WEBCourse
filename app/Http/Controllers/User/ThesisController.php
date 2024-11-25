<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thesis;
use App\Models\Education;
use App\Models\Skill;

class ThesisController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $education_id)
    {
        // Retrieve the Education model instance
        $education = Education::findOrFail($education_id);

        // Optional: Check if a thesis already exists for this education
        if ($education->thesis) {
            return redirect()->route('user.educations.index')->with('info', 'Thesis already exists for this education.');
        }

        $skills = Skill::all();

        // Pass skills to the view
        return view('user.theses.create', compact('education', 'skills'));
    }

    /**
     * Store a newly created thesis in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'education_id' => 'required',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $thesis = Thesis::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'education_id' => $validated['education_id'],
        ]);

        if (isset($validated['skills'])) {
            $thesis->skills()->attach($validated['skills']);
        }

        // Flash success message to the session
        session()->flash('success', 'Thesis [<span class="font-bold">' . $thesis->title . '</span>] created successfully');

        // Redirect to the desired route (adjust as needed)
        return redirect()->route('user.educations.show', ['education' => $request->education_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $thesis = Thesis::find($id);

        $skills = Skill::all();

        return view('user.theses.edit', compact('thesis', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        $thesis = Thesis::find($id);
        $education_id = $thesis->education_id;

        $thesis->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'education_id' => $education_id,
        ]);

        if (isset($validated['skills'])) {
            $thesis->skills()->sync($validated['skills']);
        } else {
            // If no skills are selected, detach all existing skills
            $thesis->skills()->detach();
        }

        session()->flash('success', 'Thesis [<span class="font-bold">'.$thesis->title.'</span>] updates successfully');

        return redirect()->route('user.educations.show', ['education' => $education_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thesis = Thesis::findOrFail($id);
        $education_id = $thesis->education_id;

        $thesis->delete();

        session()->flash('success', 'Thesis [<span class="font-bold">'.$thesis->title.'</span>] deleted successfully');

        return redirect()->route('user.educations.show', ['education' => $education_id]);
    }
}
