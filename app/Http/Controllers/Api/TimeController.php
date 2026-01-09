<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TimeController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Time::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_time' => 'required|string',
            'times_in'  => 'required',
            'times_out' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $time = Time::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $time
        ], 201);
    }

    public function show($id)
    {
        $time = Time::find($id);

        if (!$time) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $time
        ]);
    }

    public function update(Request $request, $id)
    {
        $time = Time::find($id);

        if (!$time) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $time->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $time
        ]);
    }

    public function destroy($id)
    {
        $time = Time::find($id);

        if (!$time) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $time->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
