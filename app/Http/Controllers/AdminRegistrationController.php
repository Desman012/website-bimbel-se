<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;

class AdminRegistrationController extends Controller
{
    public function index()
    {
        $admins = Admins::latest()->paginate(10);
        return view('admins.admin', compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'password'  => 'nullable|string|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);

        $admin = Admins::create([
            'full_name' => $request->full_name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : null,
            'status' => 'active',
            'role_id' => 1,
        ]);

        return redirect()->route('admin.registrations.index');
    }

    public function show(Admins $admin)
    {
        return view('admins.show', compact('admin'));
    }

    public function edit(Admins $admin)
    {
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, Admins $admin)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'email' => 'required|string|email|max:255|unique:admins,email,',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);
        
        $admin->update([
            'email' => $request->email,
            'full_name' => $request->full_name,
        ]);

        if ($request->filled('password')) {
            $admin->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.registrations.index')
                         ->with('success', 'Informasi admin telah di update.');
    }

    public function destroy(Admins $admin)
    {
        $admin->delete();

         return redirect()->route('admin.registrations.index')
                         ->with('success', 'Admin berhasil dihapus.');
    }
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
}