<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prices;
use App\Models\Classes;
use App\Models\Levels;

class PriceController extends Controller
{
    public function index()
    {
        $prices = Prices::with(['class', 'level'])->get();
        return view('prices.index', compact('prices'));
    }

    public function create()
    {
        $levels = Levels::all();
        $classes = Classes::all();
        return view('prices.create', compact('levels', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_id' => 'required|exists:levels,id',
            'class_id' => 'nullable|exists:classes,id',
            'price' => 'required|numeric|min:0',
        ]);

        Prices::create($request->only(['level_id', 'class_id', 'price']));

        return redirect()->route('admin.prices.index')
                        ->with('success', 'Price berhasil ditambahkan!');
    }

    public function show(Prices $price)
    {
        return view('prices.show', compact('price'));
    }

    public function edit(Prices $price)
    {
        $levels = Levels::all();
        $classes = Classes::all();
        return view('prices.edit', compact('price', 'levels', 'classes'));
    }

    public function update(Request $request, Prices $price)
    {
        $request->validate([
            'level_id' => 'required|exists:levels,id',
            'class_id' => 'nullable|exists:classes,id',
            'price' => 'required|numeric|min:0',
        ]);

        $price->update($request->only(['level_id', 'class_id', 'price']));

        return redirect()->route('admin.prices.index')
                         ->with('success', 'Price berhasil diperbarui!');
    }

    public function destroy(Prices $price)
    {
        $price->delete();
        return redirect()->route('admin.prices.index')
                         ->with('success', 'Price berhasil dihapus!');
    }
}
