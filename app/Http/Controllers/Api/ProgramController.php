<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Programs::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_program' => 'required|string',
            'deskripsi'    => 'required|string',
            'id_waktu'     => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $program = Programs::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $program
        ], 201);
    }

    public function show($id)
    {
        $program = Programs::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $program
        ]);
    }

    public function update(Request $request, $id)
    {
        $program = Programs::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $program->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $program
        ]);
    }

    public function destroy($id)
    {
        $program = Programs::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $program->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
