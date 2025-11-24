<?php

namespace App\Http\Controllers;

use App\Models\Levels;   // Pastikan model bernama Levels.php sesuai yang kamu pakai
use Illuminate\Http\Request;

class LevelController extends Controller
{
    // ================================
    // LIST LEVEL
    // ================================
    public function index()
    {
        $levels = Levels::all();
        return view('levels.index', compact('levels'));
    }

    // ================================
    // CREATE FORM
    // ================================
    public function create()
    {
        return view('levels.create');
    }

    // ================================
    // STORE DATA
    // ================================
    public function store(Request $request)
    {
        $request->validate([
            'name_level' => 'required|string|max:255'
        ]);

        Levels::create([
            'name_level' => $request->name_level
        ]);

        return redirect('/levels')->with('success', 'Level berhasil ditambahkan!');
    }

    // ================================
    // EDIT FORM
    // ================================
    public function edit($id)
    {
        $level = Levels::findOrFail($id);
        return view('levels.edit', compact('level'));
    }

    // ================================
    // UPDATE DATA
    // ================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_level' => 'required|string|max:255'
        ]);

        $level = Levels::findOrFail($id);

        $level->update([
            'name_level' => $request->name_level
        ]);

        return redirect('/levels')->with('success', 'Level berhasil diupdate!');
    }

    // ================================
    // DELETE DATA
    // ================================
    public function destroy($id)
    {
        $level = Levels::findOrFail($id);
        $level->delete();

        return redirect('/levels')->with('success', 'Level berhasil dihapus!');
    }
}
