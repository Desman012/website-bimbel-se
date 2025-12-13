<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Curriculums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CurriculumMobileController extends Controller
{
    // GET /api/curriculums
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Curriculums::all()
        ]);
    }

    // POST /api/curriculums
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_curriculum' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $curriculum = Curriculums::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Curriculum created',
            'data'    => $curriculum
        ], 201);
    }

    // GET /api/curriculums/{id}
    public function show($id)
    {
        $curriculum = Curriculums::find($id);

        if (!$curriculum) {
            return response()->json([
                'success' => false,
                'message' => 'Curriculum not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $curriculum
        ]);
    }

    // PUT /api/curriculums/{id}
    public function update(Request $request, $id)
    {
        $curriculum = Curriculums::find($id);

        if (!$curriculum) {
            return response()->json([
                'success' => false,
                'message' => 'Curriculum not found'
            ], 404);
        }

        $curriculum->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Curriculum updated',
            'data'    => $curriculum
        ]);
    }

    // DELETE /api/curriculums/{id}
    public function destroy($id)
    {
        $curriculum = Curriculums::find($id);

        if (!$curriculum) {
            return response()->json([
                'success' => false,
                'message' => 'Curriculum not found'
            ], 404);
        }

        $curriculum->delete();

        return response()->json([
            'success' => true,
            'message' => 'Curriculum deleted'
        ]);
    }
}
