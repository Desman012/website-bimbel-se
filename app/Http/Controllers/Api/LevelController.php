<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Levels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LevelController extends Controller
{
    /**
     * GET: Tampilkan semua level
     */
    public function index()
    {
        $levels = Levels::all();

        return response()->json([
            'success' => true,
            'message' => 'Data level berhasil diambil',
            'data'    => $levels
        ], 200);
    }

    /**
     * POST: Simpan level baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_level' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $level = Levels::create([
            'name_level' => $request->name_level
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Level berhasil ditambahkan',
            'data'    => $level
        ], 201);
    }

    /**
     * GET: Detail level berdasarkan ID
     */
    public function show($id)
    {
        $level = Levels::find($id);

        if (!$level) {
            return response()->json([
                'success' => false,
                'message' => 'Level tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $level
        ], 200);
    }

    /**
     * PUT: Update level
     */
    public function update(Request $request, $id)
    {
        $level = Levels::find($id);

        if (!$level) {
            return response()->json([
                'success' => false,
                'message' => 'Level tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name_level' => 'required|string|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $level->update([
            'name_level' => $request->name_level
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Level berhasil diperbarui',
            'data'    => $level
        ], 200);
    }

    /**
     * DELETE: Hapus level
     */
    public function destroy($id)
    {
        $level = Levels::find($id);

        if (!$level) {
            return response()->json([
                'success' => false,
                'message' => 'Level tidak ditemukan'
            ], 404);
        }

        $level->delete();

        return response()->json([
            'success' => true,
            'message' => 'Level berhasil dihapus'
        ], 200);
    }
}
