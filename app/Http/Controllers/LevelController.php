<?php

namespace App\Http\Controllers;

use App\Models\Levels;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Levels::all();
        return view('levels.index', compact('levels'));
    }

    public function create()
    {
        return view('levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_level' => 'required|string|max:255',
        ]);

        Levels::create([
            'name_level' => $request->name_level,
        ]);

        return redirect()->route('admin.levels.index')
                        ->with('success', 'Level berhasil ditambahkan!');
    }


    public function edit($id)
    {
        $level = Levels::findOrFail($id);
        return view('levels.edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_level' => 'required|string|max:255',
        ]);

        $level = Levels::findOrFail($id);

        $level->update([
            'name_level' => $request->name_level,
        ]);

        return redirect()->route('admin.levels.index')->with('success', 'Level berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Levels::findOrFail($id)->delete();
        return redirect()->route('admin.levels.index')->with('success', 'Level berhasil dihapus!');
    }

        public function show($id)
    {
        $level = Levels::findOrFail($id);
        return view('levels.show', compact('level'));
    }
}
