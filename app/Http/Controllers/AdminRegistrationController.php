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
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);

        Admins::create([
            'full_name' => $request->full_name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status,
        ]);

        return redirect()->route('admin.registrations.index')
                         ->with('success', 'Admin sukses dibuat.');
    }

    public function show($id)
    {
        return view('admins.show', compact('id'));
    }

    public function edit($id)
    {
        return view('admins.edit', compact('id'));
    }

    public function update(Request $request, Admins $admins)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'status' => 'required|in:active,inactive',
        ]);
        
        $admins->update([
            'email' => $request->email,
            'full_name' => $request->full_name,
        ]);

        if ($request->filled('password')) {
            $admins->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('admin.registrations.index')
                         ->with('success', 'Informasi admin telah di update.');
    }

    public function destroy(Admins $admins)
    {
        $admins->delete();

         return redirect()->route('admin.registrations.index')
                         ->with('success', 'Admin berhasil dihapus.');
    }
}