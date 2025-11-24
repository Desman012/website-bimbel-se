<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForm() {
        return view('auth.forgot-password');
    }

    public function sendLink(Request $request) {
        $request->validate(['email' => 'required|email']);

        // Cek Admin atau Student
        $userEmail = \App\Models\Admins::where('email', $request->email)->first()?->email
            ?? \App\Models\Students::where('student_email', $request->email)->first()?->student_email;

        if (!$userEmail) {
            return back()->withErrors(['email' => 'Email tidak terdaftar']);
        }

        $status = Password::sendResetLink(['email' => $userEmail]);

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }
}
