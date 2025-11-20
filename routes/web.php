<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::post('/logout', function () {
    // Logout dari semua guard yang mungkin aktif
    Auth::guard('admin')->logout();
    Auth::guard('student')->logout();
    // Hapus semua session
    session()->flush();
    // Redirect ke halaman login
    return redirect('/login');
})->name('logout');

Route::get('/logout', [HomeController::class, 'logout'])->name('logout-view');
Route::get('/forgot-password', [HomeController::class, 'forgotpassword'])->name('forgot-password');

// PUBLIC ROUTES
Route::middleware(['role'])->group(function () {
    Route::get('/', [HomeController::class, 'show'])->name('landing');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    // Route::post('/login', [AuthController::class, 'login'])->name('login-post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    // Route::post('/register', [AuthController::class, 'register'])->name('register-post');
});

// ADMIN ROUTES
Route::middleware(['auth:admin', 'role:1'])->prefix('admin')->group(function () {
    Route::get('/cek-admin', function () {
        // Print semua data user
        dd(Auth::user());
    });
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Students
    Route::get('/students', [AdminStudentController::class, 'index'])->name('admin.students.index');
    Route::get('/students/create', [AdminStudentController::class, 'create'])->name('admin.students.create');
    Route::post('/students', [AdminStudentController::class, 'store'])->name('admin.students.store');
    Route::get('/students/{id}', [AdminStudentController::class, 'show'])->name('admin.students.show');
    Route::get('/students/{id}/edit', [AdminStudentController::class, 'edit'])->name('admin.students.edit');
    Route::put('/students/{id}', [AdminStudentController::class, 'update'])->name('admin.students.update');
    Route::delete('/students/{id}', [AdminStudentController::class, 'destroy'])->name('admin.students.destroy');

    // Payments
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/payments/{id}', [AdminPaymentController::class, 'show'])->name('admin.payments.show');

    // ADMIN ROUTES
    Route::get('/registrations', [AdminRegistrationController::class, 'index'])->name('admin.registrations.index');
    Route::get('/registrations/create', [AdminRegistrationController::class, 'create'])->name('admin.registrations.create');
    Route::post('/registrations', [AdminRegistrationController::class, 'store'])->name('admin.registrations.store');
    Route::get('/registrations/{admin}', [AdminRegistrationController::class, 'show'])->name('admin.registrations.show');
    Route::get('/registrations/{admin}/edit', [AdminRegistrationController::class, 'edit'])->name('admin.registrations.edit');
    Route::put('/registrations/{admin}', [AdminRegistrationController::class, 'update'])->name('admin.registrations.update');
    Route::delete('/registrations/{admin}', [AdminRegistrationController::class, 'destroy'])->name('admin.registrations.destroy');
});

// STUDENT ROUTES
Route::middleware(['auth:student', 'role:2'])->prefix('students')->group(function () {
    Route::get('/cek-siswa', function () {
        // Print semua data user
        ddd(Auth::user());
    });
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');

    // Attendance
    Route::get('/attendance', [StudentAttendanceController::class, 'index'])->name('students.attendance.index');
    Route::post('/attendance', [StudentAttendanceController::class, 'store'])->name('students.attendance.store');
    Route::get('/attendance/history', [StudentAttendanceController::class, 'history'])->name('students.attendance.history');

    // Payment
    Route::get('/payment', [StudentPaymentController::class, 'index'])->name('students.payment.index');
    Route::post('/payment', [StudentPaymentController::class, 'store'])->name('students.payment.store');
    Route::get('/payment-history', [StudentPaymentController::class, 'history'])->name('students.payment.history');
});
