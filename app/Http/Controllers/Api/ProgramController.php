<?php

namespace App\Http\Controllers\Api;

use App\Models\Programs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        return response()->json(Programs::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_program' => 'required'
        ]);

        $program = Programs::create($request->all());
        return response()->json($program, 201);
    }

    public function update(Request $request, $id)
    {
        $program = Programs::findOrFail($id);
        $program->update($request->all());

        return response()->json($program);
    }

    public function destroy($id)
    {
        Programs::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}
