<?php

use App\Actions\Fortify\ResetUserPassword;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminStudentRegistrationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Students;
use App\Models\Admins;
use App\Http\Controllers\GuestController;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\FacilitiesController;

Route::post('/forgot-password', function (Request $request) {
    $email = $request->email;

    // Cek di table admins & students
    $guard = null;
    if (Admins::where('email', $email)->exists()) {
        $guard = 'admin';
    } elseif (Students::where('student_email', $email)->exists()) {
        $guard = 'student';
    }

    if (! $guard) {
        Log::warning("Email tidak terdaftar: $email");

        return back()->withErrors(['email' => 'Email tidak terdaftar']);
    }

    // Buat token
    $token = app(ResetUserPassword::class)->createToken($email, $guard);

    // Reset link
    $resetLink = url("/reset-password?token=$token&email=$email&guard=$guard");

    // Kirim email dengan template cantik
    Mail::to($email)->send(new ResetPasswordMail($resetLink));

    Log::info("Email reset password dikirim ke: $email");

    return back()->with('status', 'Link reset password sudah dikirim ke email Anda.');
})->name('forgot-password');

Route::post('/reset-password-submit', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
        'token' => 'required',
        'guard' => 'required',
    ]);

    $record = DB::table('password_resets')
        ->where('email', $request->email)
        ->where('guard', $request->guard)
        ->first();

    if (! $record || $record->token !== $request->token) {
        Log::warning('Token reset password invalid untuk: '.$request->email);

        return back()->withErrors(['email' => 'Token reset password tidak valid']);
    }

    app(ResetUserPassword::class)->reset($request->email, $request->password, $request->guard);

    return redirect('/login')->with('status', 'Password berhasil direset.');
});

// Tampilkan form reset password
Route::get('/reset-password', function (Request $request) {
    $token = $request->token;
    $email = $request->email;
    $guard = $request->guard;

    // Cek token ada di tabel password_resets
    $record = DB::table('password_resets')
        ->where('email', $email)
        ->where('guard', $guard)
        ->first();

    if (! $record || $record->token !== $token) {
        return redirect('/forgot-password')->withErrors(['email' => 'Token reset password tidak valid atau sudah digunakan']);
    }

    // Tampilkan view reset-password
    return view('auth.reset-password', [
        'token' => $token,
        'email' => $email,
        'guard' => $guard,
    ]);
});
// Route::get('/test-email', function () {
//     try {
//         Mail::raw('Test email', function ($message) {
//             $message->to('2310631170071@student.unsika.ac.id')
//                     ->subject('Test SMTP');
//         });
//         return 'Email sent!';
//     } catch (\Exception $e) {
//         return $e->getMessage();
//     }
// });

Route::post('/logout', function () {
    // Logout dari semua guard yang mungkin aktif
    Auth::guard('admin')->logout();
    Auth::guard('student')->logout();
    Auth::guard('guest')->logout();
    // Hapus semua session
    session()->flush();

    // Redirect ke halaman login
    return redirect('/login');
})->name('logout');

// Route::get('/logout', [HomeController::class, 'logout'])->name('logout-view');
Route::get('/forgot-password', [HomeController::class, 'forgotpassword'])->name('forgot-password');

// PUBLIC ROUTES
Route::middleware(['role'])->group(function () {
    Route::get('/', [HomeController::class, 'show'])->name('landing');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::get('/registered-success', [AuthController::class, 'registeredSuccess'])->name('registered.success');
});

Route::middleware(['auth:guest', 'role:0'])->prefix('guest')->group(function () {
    Route::get('/dashboard', [GuestController::class, 'index'])->name('guest.dashboard');
});

// ADMIN ROUTES
Route::middleware(['auth:admin', 'role:1'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/landing', [AdminRegistrationController::class, 'landing'])->name('admin.landing');
    Route::get('/landing/{id}/edit', [AdminRegistrationController::class, 'landing_edit'])->name('admin.landing_edit');
    Route::post('/landing', [AdminRegistrationController::class, 'landing_store'])->name('admin.landing_store');
    Route::delete('/landing/{id}', [AdminRegistrationController::class, 'landing_destroy'])->name('admin.landing_destroy');
    Route::get('/landing/create', [AdminRegistrationController::class, 'landing_create'])->name('admin.landing_create');
    Route::put('/landing/{data}', [AdminRegistrationController::class, 'landing_update'])->name('admin.landing_update');
    Route::post('/landing', [LandingController::class, 'store'])->name('admin.landing_store');
    
    // manajemen landing facilities
    Route::get('/landing/create/facilities', [FacilitiesController::class, 'landing_facilities_create'])->name('admin.landing_facilities_create');
    Route::get('/landing/{id}/facilities/edit', [FacilitiesController::class, 'landing_facilities_edit'])->name('admin.landing_facilities_edit');
    Route::post('/landing/facilities', [FacilitiesController::class, 'landing_facilities_store'])->name('admin.landing_facilities_store');
    Route::delete('/landing/{id}/facilities', [FacilitiesController::class, 'landing_facilities_destroy'])->name('admin.landing_facilities_destroy');
    Route::put('/landing/{data}', [FacilitiesController::class, 'landing_facilities_update'])->name('admin.landing_facilities_update');

    // Students
    Route::get('/students', [AdminStudentController::class, 'index'])->name('admin.students.index');
    Route::get('/students/create', [AdminStudentController::class, 'create'])->name('admin.students.create');
    Route::post('/students', [AdminStudentController::class, 'store'])->name('admin.students.store');
    Route::get('/students/{id}', [AdminStudentController::class, 'show'])->name('admin.students.show');
    Route::get('/students/{id}/edit', [AdminStudentController::class, 'edit'])->name('admin.students.edit');
    Route::put('/students/{id}', [AdminStudentController::class, 'update'])->name('admin.students.update');
    Route::delete('/students/{id}', [AdminStudentController::class, 'destroy'])->name('admin.students.destroy');
    // Students Payment History Import
    Route::post('/students/import-payments', [AdminStudentController::class, 'importPayments'])->name('admin.students.import-payments');

    // Payments
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/payments/{id}', [AdminPaymentController::class, 'show'])->name('admin.payments.show');
    Route::put('/admin/payments/{id}', [AdminPaymentController::class, 'updateStatus'])->name('admin.payments.update');

    // ADMIN ROUTES
    Route::get('/registrations', [AdminRegistrationController::class, 'index'])->name('admin.registrations.index');
    Route::get('/registrations/create', [AdminRegistrationController::class, 'create'])->name('admin.registrations.create');
    Route::post('/registrations', [AdminRegistrationController::class, 'store'])->name('admin.registrations.store');
    Route::get('/registrations/{admin}', [AdminRegistrationController::class, 'show'])->name('admin.registrations.show');
    Route::get('/registrations/{admin}/edit', [AdminRegistrationController::class, 'edit'])->name('admin.registrations.edit');
    Route::put('/registrations/{admin}', [AdminRegistrationController::class, 'update'])->name('admin.registrations.update');
    Route::delete('/registrations/{admin}', [AdminRegistrationController::class, 'destroy'])->name('admin.registrations.destroy');

    // ADMIN STUDENT ROUTES
    Route::get('/students', [AdminStudentController::class, 'index'])->name('admin.students.index');
    Route::get('/students/create', [AdminStudentController::class, 'create'])->name('admin.students.create');
    Route::get('/students/{student}', [AdminStudentController::class, 'show'])->name('admin.students.show');
    Route::get('/students/{student}/edit', [AdminStudentController::class, 'edit'])->name('admin.students.edit');
    Route::post('/students', [AdminStudentController::class, 'store'])->name('admin.students.store');
    Route::put('/students/{student}', [AdminStudentController::class, 'update'])->name('admin.students.update');
    Route::delete('/students/{student}', [AdminStudentController::class, 'destroy'])->name('admin.students.destroy');

    // ROUTE PENDAFTARAN
    Route::get('/student-registration', [AdminStudentRegistrationController::class, 'index'])->name('admin.students.registration.index');
    Route::get('/student-registration/data', [AdminStudentRegistrationController::class, 'getData'])->name('admin.students.registration.data');
    Route::get('/student-registration/{id}', [AdminStudentRegistrationController::class, 'show'])->name('admin.students.registration.show');
    Route::post('/students-registration/reject', [AdminStudentRegistrationController::class, 'reject'])->name('admin.students.registration.reject');
    Route::post('/students-registration/verify', [AdminStudentRegistrationController::class, 'verify'])->name('admin.students.registration.verify');

    // ROUTE JADWAL
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('admin.schedules.index');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('admin.schedules.store');

    // LEVELS
    Route::get('/levels', [LevelController::class, 'index'])->name('admin.levels.index');
    Route::get('/levels/create', [LevelController::class, 'create'])->name('admin.levels.create');
    Route::post('/levels', [LevelController::class, 'store'])->name('admin.levels.store');
    Route::get('/levels/{level}', [LevelController::class, 'show'])->name('admin.levels.show');
    Route::get('/levels/{level}/edit', [LevelController::class, 'edit'])->name('admin.levels.edit');
    Route::put('/levels/{level}', [LevelController::class, 'update'])->name('admin.levels.update');
    Route::delete('/levels/{level}', [LevelController::class, 'destroy'])->name('admin.levels.destroy');

    // CURRICULUMS
    Route::get('/curriculums', [CurriculumController::class, 'index'])->name('admin.curriculums.index');
    Route::get('/curriculums/create', [CurriculumController::class, 'create'])->name('admin.curriculums.create');
    Route::post('/curriculums', [CurriculumController::class, 'store'])->name('admin.curriculums.store');
    Route::get('/curriculums/{curriculum}', [CurriculumController::class, 'show'])->name('admin.curriculums.show');
    Route::get('/curriculums/{curriculum}/edit', [CurriculumController::class, 'edit'])->name('admin.curriculums.edit');
    Route::put('/curriculums/{curriculum}', [CurriculumController::class, 'update'])->name('admin.curriculums.update');
    Route::delete('/curriculums/{curriculum}', [CurriculumController::class, 'destroy'])->name('admin.curriculums.destroy');

    // CLASSES
    Route::get('/classes', [ClassController::class, 'index'])->name('admin.classes.index');
    Route::get('/classes/create', [ClassController::class, 'create'])->name('admin.classes.create');
    Route::post('/classes', [ClassController::class, 'store'])->name('admin.classes.store');
    Route::get('/classes/{class}', [ClassController::class, 'show'])->name('admin.classes.show');
    Route::get('/classes/{class}/edit', [ClassController::class, 'edit'])->name('admin.classes.edit');
    Route::put('/classes/{class}', [ClassController::class, 'update'])->name('admin.classes.update');
    Route::delete('/classes/{class}', [ClassController::class, 'destroy'])->name('admin.classes.destroy');

    // PRICES
    Route::get('/prices', [PriceController::class, 'index'])->name('admin.prices.index');
    Route::get('/prices/create', [PriceController::class, 'create'])->name('admin.prices.create');
    Route::post('/prices', [PriceController::class, 'store'])->name('admin.prices.store');
    Route::get('/prices/{price}', [PriceController::class, 'show'])->name('admin.prices.show');
    Route::get('/prices/{price}/edit', [PriceController::class, 'edit'])->name('admin.prices.edit');
    Route::put('/prices/{price}', [PriceController::class, 'update'])->name('admin.prices.update');
    Route::delete('/prices/{price}', [PriceController::class, 'destroy'])->name('admin.prices.destroy');

    // PROGRAMS
    Route::get('/programs', [ProgramController::class, 'index'])->name('admin.programs.index');
    Route::get('/programs/create', [ProgramController::class, 'create'])->name('admin.programs.create');
    Route::post('/programs', [ProgramController::class, 'store'])->name('admin.programs.store');
    Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('admin.programs.show');
    Route::get('/programs/{program}/edit', [ProgramController::class, 'edit'])->name('admin.programs.edit');
    Route::put('/programs/{program}', [ProgramController::class, 'update'])->name('admin.programs.update');
    Route::delete('/programs/{program}', [ProgramController::class, 'destroy'])->name('admin.programs.destroy');

    // TIMES
    Route::get('/times', [TimeController::class, 'index'])->name('admin.times.index');
    Route::get('/times/create', [TimeController::class, 'create'])->name('admin.times.create');
    Route::post('/times', [TimeController::class, 'store'])->name('admin.times.store');
    Route::get('/times/{time}', [TimeController::class, 'show'])->name('admin.times.show');
    Route::get('/times/{time}/edit', [TimeController::class, 'edit'])->name('admin.times.edit');
    Route::put('/times/{time}', [TimeController::class, 'update'])->name('admin.times.update');
    Route::delete('/times/{time}', [TimeController::class, 'destroy'])->name('admin.times.destroy');
});

// STUDENT ROUTES
Route::middleware(['auth:student', 'role:2'])->prefix('students')->group(function () {
    // Route::get('/cek-siswa', function () {
    //     dd(Auth::guard('student')->user()->levels_id);
    // });
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');

    // Attendance
    Route::get('/attendance', [StudentAttendanceController::class, 'index'])->name('students.attendance.index');
    Route::post('/attendance', [StudentAttendanceController::class, 'store'])->name('students.attendance.store');
    Route::get('/attendance/history', [StudentAttendanceController::class, 'history'])->name('students.attendance.history');
    Route::get('/students/attendance/export', [StudentAttendanceController::class, 'export'])->name('students.attendance.export');
    // Payment
    Route::get('/payment', [StudentPaymentController::class, 'index'])->name('students.payment.index');
    Route::post('/payment', [StudentPaymentController::class, 'store'])->name('students.payment.store');
    Route::get('/payment-history', [StudentPaymentController::class, 'history'])->name('students.payment.history');
    // Route::get('/payment/cancel/{id}', [StudentPaymentController::class, 'cancel'])->name('students.payment.cancel');
});
