<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\Reviews;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $reviews = Reviews::all();
        $facilities = Facilities::all();
        return view('landing.index', compact(['reviews','facilities']));
    }
}
