<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassesController extends Controller
{
    /**
     * GET: Tampilkan semua kelas
     */
    public function index()
    {
        $kelas = Classes::with('level')->get();

        return response()->json([
            'success' => true,
            'message' => 'Data kelas berhasil diambil',
            'data' => $kelas
        ], 200);
    }

    /**
     * POST: Simpan data kelas
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level_id'   => 'required|exists:levels,id',
            'name_class' => 'required|string|max:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $kelas = Classes::create([
            'level_id'   => $request->level_id,
            'name_class' => $request->name_class
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kelas berhasil ditambahkan',
            'data'    => $kelas
        ], 201);
    }

    /**
     * GET: Detail kelas berdasarkan ID
     */
    public function show($id)
    {
        $kelas = Classes::with(['level', 'prices'])->find($id);

        if (!$kelas) {
            return response()->json([
                'success' => false,
                'message' => 'Kelas tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $kelas
        ], 200);
    }

    /**
     * PUT: Update data kelas
     */
    public function update(Request $request, $id)
    {
        $kelas = Classes::find($id);

        if (!$kelas) {
            return response()->json([
                'success' => false,
                'message' => 'Kelas tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'level_id'   => 'required|exists:levels,id',
            'name_class' => 'required|string|max:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $kelas->update([
            'level_id'   => $request->level_id,
            'name_class' => $request->name_class
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Kelas berhasil diperbarui',
            'data'    => $kelas
        ], 200);
    }

    /**
     * DELETE: Hapus kelas
     */
    public function destroy($id)
    {
        $kelas = Classes::find($id);

        if (!$kelas) {
            return response()->json([
                'success' => false,
                'message' => 'Kelas tidak ditemukan'
            ], 404);
        }

        $kelas->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kelas berhasil dihapus'
        ], 200);
    }
}
