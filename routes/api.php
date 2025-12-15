<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Classes;
use App\Models\Prices;
use App\Models\DayTime;
use App\Models\Day;
use App\Models\Time;
use App\Http\Controllers\Api\SiswaMobileController;

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
Route::get('/day_time/{class_id}', function($class_id) {
    $data = DayTime::with(['day','time'])
        ->where('id_class', $class_id)
        ->get()
        ->map(function($dt){
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

    //Buat Mobile Siswa
    Route::get('/students', [SiswaMobileController::class, 'index']);
    Route::post('/students', [SiswaMobileController::class, 'store']);
    Route::get('/students/{id}', [SiswaMobileController::class, 'show']);
    Route::put('/students/{id}', [SiswaMobileController::class, 'update']);
    Route::delete('/students/{id}', [SiswaMobileController::class, 'destroy']);
    Route::get('/students-data', [SiswaMobileController::class, 'getData']);

    Route::get('/ping', function () {
    return response()->json(['ping' => 'ok']);
});
