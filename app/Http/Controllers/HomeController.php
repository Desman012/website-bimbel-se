<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\Reviews;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $reviews = Reviews::orderBy('created_at', 'desc')->limit(6)->get();
        $facilities = Facilities::all();
        return view('landing.index', compact(['reviews','facilities']));
    }
}
