<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // READ ALL
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Admins::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'email' => 'required|email|unique:admins',
        //     'password' => 'required|min:6'
        // ]);

        $admin = Admins::create([
            'role_id' => 2,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'status' => 'active'
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $admin
        ]);
    }


    /**
     * Display the specified resource.
     */
   // READ DETAIL
    public function show($id)
    {
        $admin = Admins::find($id);
        if (!$admin) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Admin tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // UPDATE
    public function update(Request $request, $id)
    {
        $admin = Admins::find($id);

        if (!$admin) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Admin tidak ditemukan'
            ], 404);
        }

        $admin->update([
            'full_name' => $request->full_name ?? $admin->full_name,
            'address' => $request->address ?? $admin->address,
            'password' => $request->password
                ? Hash::make($request->password)
                : $admin->password
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $admin
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
     // DELETE
    public function destroy($id)
    {
        $admin = Admins::find($id);

        if (!$admin) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Admin tidak ditemukan'
            ], 404);
        }

        $admin->delete();

        return response()->json([
            'status' => 'success',
            'data' => $admin
        ]);
    }
}
