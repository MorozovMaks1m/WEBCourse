<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::whereNotNull('start_date')->orderByDesc('start_date')->get();

        return view('educations.index')->with('educations', $educations);
    }

    public function show(int $id)
    {
        $education = Education::all()->where('id', $id)->first();

        if($education === null){
            abort(404);
        }
        return view('educations.show')->with('education', $education);
    }
}
