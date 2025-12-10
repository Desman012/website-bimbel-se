<?php

namespace App\Http\Controllers;

use App\Models\Programs;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Programs::all();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_program' => 'required|string|max:255',
        ]);

        Programs::create([
            'name_program' => $request->name_program,
        ]);

        return redirect()->route('admin.programs.index')
                        ->with('success', 'Program berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $program = Programs::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_program' => 'required|string|max:255',
        ]);

        $program = Programs::findOrFail($id);

        $program->update([
            'name_program' => $request->name_program,
        ]);

        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Programs::findOrFail($id)->delete();
        return redirect()->route('admin.programs.index')->with('success', 'Program berhasil dihapus!');
    }

        public function show($id)
    {
        $program = Programs::findOrFail($id);
        return view('programs.show', compact('program'));
    }
}
