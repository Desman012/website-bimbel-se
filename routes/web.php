<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentPaymentController;


// PUBLIC ROUTES
Route::get('/', [HomeController::class, 'show'])->name('landing');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login'])->name('login-post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'register'])->name('register-post');




// ADMIN ROUTES
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

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

    // Registrations
    Route::get('/registrations', [AdminRegistrationController::class, 'index'])->name('admin.registrations.index');
    Route::get('/registrations/{id}', [AdminRegistrationController::class, 'show'])->name('admin.registrations.show');
});


// STUDENT ROUTES
Route::middleware(['auth', 'role:student'])->prefix('student')->group(function () {

    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

    // Attendance
    Route::get('/attendance', [StudentAttendanceController::class, 'index'])->name('student.attendance.index');
    Route::post('/attendance', [StudentAttendanceController::class, 'store'])->name('student.attendance.store');
    Route::get('/attendance/history', [StudentAttendanceController::class, 'history'])->name('student.attendance.history');

    // Payment
    Route::get('/payment', [StudentPaymentController::class, 'index'])->name('student.payment.index');
    Route::post('/payment', [StudentPaymentController::class, 'store'])->name('student.payment.store');
    Route::get('/payment/history', [StudentPaymentController::class, 'history'])->name('student.payment.history');
});

