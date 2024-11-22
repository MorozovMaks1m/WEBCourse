<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = Education::all();

        return view('user.educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.educations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $education = Education::create([
            'school_name' => $request->school_name,
            'stage' => $request->stage,
            'gpa' => $request->gpa,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        session()->flash('success', 'Education [<span class="font-bold">'.$education->school_name.'</span>] with stage [<span class="font-bold">'.$education->stage.'</span>] created successfully');

        return redirect()->route('user.educations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $education = Education::findOrFail($id);

        return view('user.educations.show', compact('education'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $education = Education::find($id);

        return view('user.educations.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $education = Education::find($id);

        $education->update([
            'school_name' => $request->school_name,
            'stage' => $request->stage,
            'gpa' => $request->gpa,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        if ($request->has('image')) {

            // Remove existing image if any
            if ($education->hasMedia('images')) {
                $education->clearMediaCollection('images');
            }

            // Add the new image
            $education->addMediaFromRequest('image')
                     ->toMediaCollection('images');
        }

        session()->flash('success', 'Education [<span class="font-bold">'.$education->school_name.'</span>] with stage [<span class="font-bold">'.$education->stage.'</span>] updated successfully');

        return redirect()->route('user.educations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);

        $education->delete();

        session()->flash('success', 'Education [<span class="font-bold">'.$education->school_name.'</span>] with stage [<span class="font-bold">'.$education->stage.'</span>] deleted successfully');

        return redirect()->route('user.educations.index');
    }
}
