<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use Illuminate\Http\Request;

class FacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function landing_facilities_create()
    {
        return view('admins.facilities-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function landing_facilities_store(Request $request)
    {
        $request->validate([
            'name_facilities' => 'required|string|max:50',
            'description'       => 'required|string|max:50',
        ]);

        Facilities::create([
            'name_facilities' => $request->name_facilities,
            'description'       => $request->description,
        ]);

        return redirect()->route('admin.landing')
                        ->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function landing_facilities_edit($id)
    {
        $data=Facilities::findOrFail($id);
        return view('admins.facilities-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function landing_facilities_update(Request $request, $data)
    {
        $facilities=Facilities::findOrFail($data);
        $facilities->update([
            'name_facilities' => $request->name_facilities,
            'description'       => $request->description,
        ]);

        return redirect()->route('admin.landing')
                         ->with('success', 'Informasi admin telah di update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function landing_facilities_destroy($id)
    {
        $facilities = Facilities::findOrFail($id);
        $facilities->delete();

        return redirect()->route('admin.landing')
                        ->with('success', 'Fasilitas berhasil dihapus.');
    }
}
