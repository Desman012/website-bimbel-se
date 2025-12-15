<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Classes;
use App\Models\Levels;
use App\Models\Prices;
use App\Models\DayTime;
use App\Models\Day;
use App\Models\Time;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\TimeController;
use App\Http\Controllers\Api\PriceMobileController;
use App\Http\Controllers\Api\CurriculumMobileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ambil kelas berdasarkan level_id
Route::get('/Classes/{level_id}', function ($level_id) {
    return Classes::where('level_id', $level_id)->get();
});



// Ambil harga berdasarkan level_id & class_id
Route::get('/prices/{level_id}/{class_id}', function ($level_id, $class_id) {
    return Prices::where('level_id', $level_id)
        ->where('class_id', $class_id)
        ->first();
});

// Ambil day_time berdasarkan class_id
Route::get('/day_time/{class_id}', function ($class_id) {
    $data = DayTime::with(['day', 'time'])
        ->where('id_class', $class_id)
        ->get()
        ->map(function ($dt) {
            return [
                'day_id' => $dt->day->id,
                'day_name' => $dt->day->name,
                'time_id' => $dt->time->id,
                'name_time' => $dt->time->name_time,
                'time_in' => $dt->time->times_in,
                'time_out' => $dt->time->times_out
            ];
        });
    return response()->json($data);
});

Route::prefix('admin')->group(function () {
    Route::get('/programs', [ProgramController::class, 'index']);
    Route::post('/programs', [ProgramController::class, 'store']);
    Route::put('/programs/{id}', [ProgramController::class, 'update']);
    Route::delete('/programs/{id}', [ProgramController::class, 'destroy']);

    Route::get('/times', [TimeController::class, 'index']);
    Route::post('/times', [TimeController::class, 'store']);
    Route::put('/times/{id}', [TimeController::class, 'update']);
    Route::delete('/times/{id}', [TimeController::class, 'destroy']);
});
// Ambil kelas berdasarkan level_id
Route::get('/classes', function () {
    return response()->json([
        'success' => true,
        'data' => Classes::all()
    ]);
});

// Ambil kelas berdasarkan level_id
Route::get('/levels', function () {
    return response()->json([
        'success' => true,
        'data' => Levels::all()
    ]);
});

// Price API
Route::apiResource('prices', PriceMobileController::class);

// Curriculum API
Route::apiResource('curriculums', CurriculumMobileController::class);
