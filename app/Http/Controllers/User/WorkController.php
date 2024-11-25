<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::all();

        return view('user.works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.works.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:24576', // Max 24MB
        ]);

        $work = Work::create([
            'company' => $validatedData['company'],
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'] ?? null,
        ]);

        if ($request->has('image')) {
            // Remove existing image if any
            if ($work->hasMedia('images')) {
                $work->clearMediaCollection('images');
            }
            // Add the new image
            $work->addMediaFromRequest('image')
                     ->toMediaCollection('images');
        }

        session()->flash('success', 'Company [<span class="font-bold">'.$work->company.'</span>] with title [<span class="font-bold">'.$work->title.'</span>] created successfully');

        return redirect()->route('user.works.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $work = Work::findOrFail($id);

        return view('user.works.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $work = Work::find($id);

        return view('user.works.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'company' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:24576', // Max 24MB
        ]);

        $work = Work::find($id);

        $work->update([
            'company' => $validatedData['company'],
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'] ?? null,
        ]);

        if ($request->has('image')) {
            // Remove existing image if any
            if ($work->hasMedia('images')) {
                $work->clearMediaCollection('images');
            }
            // Add the new image
            $work->addMediaFromRequest('image')
                     ->toMediaCollection('images');
        }

        session()->flash('success', 'Company [<span class="font-bold">'.$work->company.'</span>] with title [<span class="font-bold">'.$work->title.'</span>] updated successfully');

        return redirect()->route('user.works.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $work = Work::findOrFail($id);

        $work->delete();

        session()->flash('success', 'Company [<span class="font-bold">'.$work->company.'</span>] with title [<span class="font-bold">'.$work->title.'</span>] deleted successfully');

        return redirect()->route('user.works.index');
    }
}
