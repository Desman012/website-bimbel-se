<?php

namespace App\Http\Controllers;

use App\Models\Curriculums;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index()
    {
        $curriculums = Curriculums::all();
        return view('curriculums.index', compact('curriculums'));
    }

    public function create()
    {
        return view('curriculums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_curriculum' => 'required|string|max:255',
        ]);

        Curriculums::create([
            'name_curriculum' => $request->name_curriculum,
        ]);

        return redirect()->route('admin.curriculums.index')
                        ->with('success', 'Kurikulum berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $curriculum = Curriculums::findOrFail($id);
        return view('curriculums.edit', compact('curriculum'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_curriculum' => 'required|string|max:255',
        ]);

        $curriculum = Curriculums::findOrFail($id);

        $curriculum->update([
            'name_curriculum' => $request->name_curriculum,
        ]);

        return redirect()->route('admin.curriculums.index')->with('success', 'Kurikulum berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Curriculums::findOrFail($id)->delete();
        return redirect()->route('admin.curriculums.index')->with('success', 'Kurikulum berhasil dihapus!');
    }

        public function show($id)
    {
        $curriculum = Curriculums::findOrFail($id);
        return view('curriculums.show', compact('curriculum'));
    }
}
