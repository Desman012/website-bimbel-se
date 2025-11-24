<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Levels;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    // ============================
    // LIST
    // ============================
    public function index()
    {
        $classes = Classes::with('level')->get();
        return view('classes.index', compact('classes'));
    }

    // ============================
    // FORM CREATE
    // ============================
    public function create()
    {
        $levels = Levels::all(); // untuk dropdown
        return view('classes.create', compact('levels'));
    }

    // ============================
    // STORE
    // ============================
    public function store(Request $request)
    {
        $request->validate([
            'level_id'   => 'required|exists:levels,id',
            'name_class' => 'required|string|max:255',
        ]);

        Classes::create([
            'level_id'   => $request->level_id,
            'name_class' => $request->name_class,
        ]);

        return redirect('/classes')->with('success', 'Kelas berhasil ditambahkan!');
    }

    // ============================
    // FORM EDIT
    // ============================
    public function edit($id)
    {
        $class = Classes::findOrFail($id);
        $levels = Levels::all();
        return view('classes.edit', compact('class', 'levels'));
    }

    // ============================
    // UPDATE
    // ============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'level_id'   => 'required|exists:levels,id',
            'name_class' => 'required|string|max:255',
        ]);

        $class = Classes::findOrFail($id);

        $class->update([
            'level_id'   => $request->level_id,
            'name_class' => $request->name_class,
        ]);

        return redirect('/classes')->with('success', 'Kelas berhasil diperbarui!');
    }

    // ============================
    // DELETE
    // ============================
    public function destroy($id)
    {
        Classes::findOrFail($id)->delete();

        return redirect('/classes')->with('success', 'Kelas berhasil dihapus!');
    }

        public function show($id)
    {
        $class = Classes::with('level')->findOrFail($id);
        return view('classes.show', compact('class'));
    }

}
