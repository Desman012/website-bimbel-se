<?php

namespace App\Http\Controllers\Api;

use App\Models\Time;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        return response()->json(Time::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_time' => 'required',
            'times_in' => 'required',
            'times_out' => 'required',
        ]);

        $time = Time::create($request->all());
        return response()->json($time, 201);
    }

    public function update(Request $request, $id)
    {
        $time = Time::findOrFail($id);
        $time->update($request->all());

        return response()->json($time);
    }

    public function destroy($id)
    {
        Time::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}

