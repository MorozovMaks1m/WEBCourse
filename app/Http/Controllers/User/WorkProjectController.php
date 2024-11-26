<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkProject;
use App\Models\Work;
use App\Models\Skill;

class WorkProjectController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $work_id)
    {
        // Retrieve the Work model instance
        $work = Work::findOrFail($work_id);

        $skills = Skill::all();

        // Pass skills to the view
        return view('user.workprojects.create', compact('work', 'skills'));
    }

    /**
     * Store a newly created work_project in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'work_id' => 'required',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        // Create the WorkProject
        $work_project = WorkProject::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'work_id' => $validated['work_id'],
        ]);

        if (isset($validated['skills'])) {
            $work_project->skills()->attach($validated['skills']);
        }

        // Flash success message to the session
        session()->flash('success', 'WorkProject [<span class="font-bold">' . $work_project->title . '</span>] created successfully');

        // Redirect to the desired route (adjust as needed)
        return redirect()->route('user.works.show', ['work' => $request->work_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $work_project = WorkProject::find($id);

        $skills = Skill::all();

        return view('user.workprojects.edit', compact('work_project', 'skills'));
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

        $work_project = WorkProject::find($id);
        $work_id = $work_project->work_id;

        $work_project->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'work_id' => $work_id,
        ]);

        if (isset($validated['skills'])) {
            $work_project->skills()->sync($validated['skills']);
        } else {
            // If no skills are selected, detach all existing skills
            $work_project->skills()->detach();
        }

        session()->flash('success', 'WorkProject [<span class="font-bold">'.$work_project->title.'</span>] updates successfully');

        return redirect()->route('user.works.show', ['work' => $work_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $work_project = WorkProject::findOrFail($id);
        $work_id = $work_project->work_id;

        $work_project->delete();

        session()->flash('success', 'WorkProject [<span class="font-bold">'.$work_project->title.'</span>] deleted successfully');

        return redirect()->route('user.works.show', ['work' => $work_id]);
    }
}
