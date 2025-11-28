<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {
        $times = Time::all();
        return view('times.index', compact('times'));
    }

    public function create()
    {
        return view('times.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_time' => 'required|string|max:50',
            'times_in'  => 'nullable',
            'times_out' => 'nullable',
        ]);

        Time::create([
            'name_time' => $request->name_time,
            'times_in'  => $request->times_in,
            'times_out' => $request->times_out,
        ]);

        return redirect()->route('admin.times.index')
                        ->with('success', 'Time berhasil ditambahkan!');
    }

    public function show(Time $time)
    {
        return view('times.show', compact('time'));
    }

    public function edit(Time $time)
    {
        return view('times.edit', compact('time'));
    }

    public function update(Request $request, Time $time)
    {
        $request->validate([
            'name_time' => 'required|string|max:50',
            'times_in'  => 'nullable',
            'times_out' => 'nullable',
        ]);

        $time->update([
            'name_time' => $request->name_time,
            'times_in'  => $request->times_in,
            'times_out' => $request->times_out,
        ]);

        return redirect()->route('admin.times.index')
                         ->with('success', 'Time berhasil diperbarui!');
    }

    public function destroy(Time $time)
    {
        $time->delete();

        return redirect()->route('admin.times.index')
                         ->with('success', 'Time berhasil dihapus!');
    }
}
