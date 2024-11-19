<?php

namespace App\Http\Controllers;
use App\Models\Work;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $works = Work::all()->sortByDesc('start_date');

        return view('welcome')->with('works', $works);
    }
}
