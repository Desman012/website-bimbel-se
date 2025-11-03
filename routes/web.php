<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




// PUBLIC ROUTES
Route::get('/', function () {
    return view('landing-index');
})->name('landing');

Route::get('/login', function () {
    return view('auth-login');
})->name('login');

Route::post('/login', function () {
    // proses login
})->name('login-post');

Route::get('/register', function () {
    return view('auth-register');
})->name('register');

Route::post('/register', function () {
    // proses register
})->name('register-post');


// ADMIN ROUTES
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin-dashboard');
    })->name('admin-dashboard');

    // Students
    Route::get('/students', function () {
        return view('admin-students-index');
    })->name('admin.students.index');

    Route::get('/students/create', function () {
        return view('admin.students.create');
    })->name('admin.students.create');

    Route::post('/students', function () {
        // simpan data siswa
    })->name('admin.students.store');

    Route::get('/students/{id}', function ($id) {
        return view('admin.students.show', compact('id'));
    })->name('admin.students.show');

    Route::get('/students/{id}/edit', function ($id) {
        return view('admin.students.edit', compact('id'));
    })->name('admin.students.edit');

    Route::put('/students/{id}', function ($id) {
        // update data siswa
    })->name('admin.students.update');

    Route::delete('/students/{id}', function ($id) {
        // hapus siswa
    })->name('admin.students.destroy');

    // Payments
    Route::get('/payments', function () {
        return view('admin.payments.index');
    })->name('admin.payments.index');

    Route::get('/payments/{id}', function ($id) {
        return view('admin.payments.show', compact('id'));
    })->name('admin.payments.show');

    // Registrations
    Route::get('/registrations', function () {
        return view('admin.registrations.index');
    })->name('admin.registrations.index');

    Route::get('/registrations/{id}', function ($id) {
        return view('admin.registrations.show', compact('id'));
    })->name('admin.registrations.show');
});


// STUDENT ROUTES
Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {

    Route::get('/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');

    // Attendance
    Route::get('/attendance', function () {
        return view('student.attendance.index');
    })->name('student.attendance.index');

    Route::post('/attendance', function () {
        // simpan absensi
    })->name('student.attendance.store');

    Route::get('/attendance/history', function () {
        return view('student.attendance.history');
    })->name('student.attendance.history');

    // Payment
    Route::get('/payment', function () {
        return view('student.payment.index');
    })->name('student.payment.index');

    Route::post('/payment', function () {
        // kirim bukti pembayaran
    })->name('student.payment.store');

    Route::get('/payment/history', function () {
        return view('student.payment.history');
    })->name('student.payment.history');
});

