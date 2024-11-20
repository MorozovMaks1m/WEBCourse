<?php

namespace App\Http\Controllers;
use App\Models\Work;
use App\Models\Education;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $lastWork = Work::all()->sortByDesc('start_date')->first();
        $lastEducation = Education::all()->sortByDesc('start_date')->first();

        return view('welcome')->with('work', $lastWork)->with('education', $lastEducation);;
    }
}
