<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::whereNotNull('start_date')->orderByDesc('start_date')->get();

        return view('works.index')->with('works', $works);
    }

    public function show(int $id)
    {
        $work = Work::all()->where('id', $id)->first();

        if($work === null){
            abort(404);
        }
        return view('works.show')->with('work', $work);
    }
}
