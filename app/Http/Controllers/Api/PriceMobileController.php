<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Prices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PriceMobileController extends Controller
{
    // GET /api/prices
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Prices::all()
        ]);
    }

    // POST /api/prices
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level_id'  => 'required|integer',
            'class_id'  => 'required|integer',
            'price' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        $price = Prices::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Price created',
            'data'    => $price
        ], 201);
    }

    // GET /api/prices/{id}
    public function show($id)
    {
        $price = Prices::find($id);

        if (!$price) {
            return response()->json([
                'success' => false,
                'message' => 'Price not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $price
        ]);
    }

    // PUT /api/prices/{id}
    public function update(Request $request, $id)
    {
        $price = Prices::find($id);

        if (!$price) {
            return response()->json([
                'success' => false,
                'message' => 'Price not found'
            ], 404);
        }

        $price->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Price updated',
            'data'    => $price
        ]);
    }

    // DELETE /api/prices/{id}
    public function destroy($id)
    {
        $price = Prices::find($id);

        if (!$price) {
            return response()->json([
                'success' => false,
                'message' => 'Price not found'
            ], 404);
        }

        $price->delete();

        return response()->json([
            'success' => true,
            'message' => 'Price deleted'
        ]);
    }
}
