<?php

namespace App\Providers;

use App\Actions\Fortify\ResetUserPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\Admins;
use App\Models\Students;
use App\Actions\Fortify\CreateNewStudents;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use App\Http\Responses\RegisterResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;




class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ===== Login 2 Role =====
        // Custom login Fortify
        Fortify::authenticateUsing(function ($request) {

            // 1) Coba login sebagai Admin
            $admin = Admins::where('email', $request->email)->first();
            if ($admin && Hash::check($request->password, $admin->password)) {
                Auth::guard('admin')->login($admin);
                // Simpan info tambahan di session
                session([
                    'role_id' => $admin->role_id,
                    'name' => $admin->full_name,
                    'email' => $admin->email,
                ]);

                return $admin;
            }

            // 2) Coba login sebagai Student
            $student = Students::where('student_email', $request->email)->first();
            if ($student && Hash::check($request->password, $student->password)) {
                Auth::guard('student')->login($student);
                session([
                    'role_id' => $student->role_id,
                    'name' => $student->full_name,
                    'email' => $student->student_email,
                ]);

                return $student;
            }

            return null;
        });


        // ===== Login Response Redirect Berdasarkan Role =====
        $this->app->instance(LoginResponseContract::class, new class implements LoginResponseContract {
            public function toResponse($request)
            {
                $role_id = session('role_id');

                if ($role_id == 1) {
                    return redirect()->intended('/admin/dashboard');
                } elseif ($role_id == 2) {
                    return redirect()->intended('/students/dashboard');
                }

                return redirect('/');
            }
        });

        // Views
        Fortify::loginView(function () {
            return view('auth.login'); // Bisa tambahkan switch guard di form
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        // Custom send reset link
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::createUsersUsing(CreateNewStudents::class);
        $this->app->instance(RegisterResponseContract::class, new RegisterResponse());

        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);


        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
