<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Classes;
use App\Models\Prices;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Classes/{level_id}', function ($level_id) {
    return Classes::where('level_id', $level_id)->get();
});

Route::get('/prices/{level_id}/{class_id}', function ($level_id, $class_id) {
    return Prices::where('level_id', $level_id)
                ->where('class_id', $class_id)
                ->first();
});
